<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Dish;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



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
        $months = range(1, 12);
        $current_year = Carbon::now()->year;

        $orders_per_month = Order::select([
            DB::raw('MONTH(`created_at`) as months'),
            DB::raw('COUNT(0) as orders')
          ])
          ->whereHas('dishes', function ($query) use ($restaurant_id) {
                $query->where('restaurant_id', $restaurant_id);
            })
          ->whereYear('created_at', $current_year)
          ->groupBy(DB::raw('MONTH(`created_at`)'))
          ->orderBy(DB::raw('MONTH(`created_at`)'))
          ->get();

        $orders_data = $orders_per_month->pluck('orders', 'months')->toArray();

        $orders = array_map(function ($month) use ($orders_data) {
          return [
            'months' => $month,
            'orders' => $orders_data[$month] ?? 0,
          ];
        }, $months);

        // return response()->json($orders_month);

        // $dishes = Dish::where('restaurant_id', $restaurant_id)->pluck('id')->toArray();
        // $orders = Order::whereHas('dishes', function ($query) use ($restaurant_id) {
        //     $query->where('restaurant_id', $restaurant_id);
        // })->orderByDesc('created_at')->get();

        return view("admin.orders.stats", compact("orders", "restaurant"));
    }
}
