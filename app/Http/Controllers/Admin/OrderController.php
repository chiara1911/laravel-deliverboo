<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Dish;
use Illuminate\Support\Facades\Auth;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurant = Auth::user()->restaurant;

        $restaurant_id = Auth::user()->restaurant->id;
        // $dishes = Dish::where('restaurant_id', $restaurant_id)->pluck('id')->toArray();
        $orders = Order::whereHas('dishes', function ($query) use ($restaurant_id) {
            $query->where('restaurant_id', $restaurant_id);
        })->orderByDesc('created_at')->get();

        return view("admin.orders.index", compact("orders", "restaurant"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function stats()
    {
        $restaurant = Auth::user()->restaurant;

        $restaurant_id = Auth::user()->restaurant->id;
        // $dishes = Dish::where('restaurant_id', $restaurant_id)->pluck('id')->toArray();
        $orders = Order::whereHas('dishes', function ($query) use ($restaurant_id) {
            $query->where('restaurant_id', $restaurant_id);
        })->orderByDesc('created_at')->get();

        return view("admin.orders.stats", compact("orders", "restaurant"));
    }
}