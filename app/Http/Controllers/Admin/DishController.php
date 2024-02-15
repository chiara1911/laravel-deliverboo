<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $restaurant = Auth::user()->restaurant;
        $restaurantId = $restaurant->id;
        $dishes = Dish::where('restaurant_id', $restaurantId)->orderBy('name')->get();
        $deletedDishes = Dish::where('restaurant_id', $restaurantId)->onlyTrashed()->get();
        // dd($deletedDishes);
        return view('admin.dishes.index', compact('dishes', 'deletedDishes', 'restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $formData = $request->validated();

        $restaurant = Auth::user()->restaurant->id;
        $formData['restaurant_id'] = $restaurant;

        if ($request->hasFile('image')) {
            $name = Str::slug($formData['name'], '-') . '.jpg';
            $img_path = Storage::putFileAs('dishes', $formData['image'], $name);
            $formData['image'] = $img_path;
        }

        $newDish = Dish::create($formData);

        return redirect()->route('admin.dishes.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        //
        $currentUser = Auth::user()->id;
        $dishRestaurant = $dish->restaurant_id;
        if ($currentUser != $dishRestaurant) {
            abort('404');
        }
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        $currentUser = Auth::user()->id;
        $dishUser = $dish->restaurant->user_id;
        if ($currentUser != $dishUser) {
            abort('404');
        }
        // $restaurant = Auth::user()->restaurant->id;
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $formData = $request->validated();

        $restaurant = Auth::user()->restaurant->id;
        $formData['restaurant_id'] = $restaurant;

        if ($request->hasFile('image')) {
            if ($dish->image) {
                Storage::delete($dish->image);
            }
            $name = Str::slug($formData['name'], '-') . '.jpg';
            $img_path = Storage::putFileAs('dishes', $formData['image'], $name);
            $formData['image'] = $img_path;
        }
        $dish->update($formData);
        return to_route('admin.dishes.show', $dish->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {

        $dish->delete();
        // if ($dish->image) {
        //     Storage::delete($dish->image);
        // }
        return to_route('admin.dishes.index')->with('message', "Il piatto '$dish->name' è stato cancellato");

    }
    public function restore($id)
    {
        $dish = Dish::withTrashed()->find($id);
        $dish->restore();
        return to_route('admin.dishes.index')->with('message', "Il piatto '$dish->name' è stato ripristinato");

    }
}
