<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Restaurant;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // $restaurant= Restaurant::all();
        $currentUserId = Auth::id();

        $restaurant = Restaurant::where('user_id', $currentUserId)->first();
        return view('home', compact('restaurant'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $types = Type::all();
        return view('admin.restaurants.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        //
        // $formData = $request->validated();


        // $formDataUser =[
        //     'name' => $formData['name'],
        //     'surname' => $formData['surname'],
        //     'email' => $formData['email'],
        // ];
        // $newUser = User::create($formDataUser);

        // $formDataRestaurant= [
        //     'name' => $formData['restaurant_name'],
        //     'vat' => $formData['vat'],
        //     'address' => $formData['address'],
        //     'user_id' => $newUser->id,
        // ];
        // $slug = Str::slug($formData['restaurant_name'], '-');
        // $formDataRestaurant['slug'] = $slug;


        // if ($request->hasFile('image')) {
        //     $name = Str::slug($formData['restaurant_name'], '-') . '.jpg';
        //     $img_path = Storage::putFileAs('restaurants', $formData['image'], $name);
        //     $formDataRestaurant['image'] = $img_path;
        // } else {
        //     $formDataRestaurant['image'] = 'restaurants/restaurant-placeholder.jpg';
        // }
        // $currentUserId = Auth::id();
        // $formData['user_id'] = $currentUserId;
        // $newRestaurant = Restaurant::create($formDataRestaurant);
        // $newRestaurant->types()->attach($request->types);

        // return redirect()->route('admin.dishes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        //
        // $restaurantUser = $restaurant->user_id;

        return view ('home', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
