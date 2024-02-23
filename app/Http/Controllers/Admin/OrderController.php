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
        $restaurant = Auth::user()->restaurant;
        $currentUser = Auth::user()->id;
        // $orderUser = $order->dish->restaurant->user_id;
        // if ($currentUser != $orderUser) {
        //     abort('404');
        // }
        return view('admin.orders.show', compact('order', 'restaurant'));
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
        $months = array(9, 10, 11, 12, 1, 2, 3);
        $current_year = Carbon::now()->year;

        $orders_per_month = Order::select([
            DB::raw('MONTH(`created_at`) as months'),
            DB::raw('COUNT(0) as orders')
        ])
            ->whereHas('dishes', function ($query) use ($restaurant_id) {
                $query->where('restaurant_id', $restaurant_id);
            })
            ->whereYear('created_at', '<=', $current_year)
            ->groupBy(DB::raw('MONTH(`created_at`)'))
            ->orderBy(DB::raw('MONTH(`created_at`)'))
            ->get();

        $orders_data = $orders_per_month->pluck('orders', 'months')->toArray();

        $orders_tot = Order::select([
            DB::raw('MONTH(`created_at`) as months'),
            DB::raw('SUM(`total_price`) as earnings')
        ])
            ->whereHas('dishes', function ($query) use ($restaurant_id) {
                $query->where('restaurant_id', $restaurant_id);
            })
            ->whereYear('created_at', '<=', $current_year)
            ->groupBy(DB::raw('MONTH(`created_at`)'))
            ->orderBy(DB::raw('MONTH(`created_at`)'))
            ->get()
            ->pluck('earnings', 'months')
            ->toArray();


        $orders_earnings = array_map(function ($months) use ($orders_tot) {
            return [
                'months' => date('M', mktime(0, 0, 0, $months, 10)),
                'earnings' => $orders_tot[$months] ?? 0,
            ];
        }, $months);


        $orders_current_month = Order::select([
            DB::raw('WEEK(`created_at`) as current_week'),
            DB::raw('SUM(total_price) as current_earnings')
        ])
            ->whereHas('dishes', function ($query) use ($restaurant_id) {
                $query->where('restaurant_id', $restaurant_id);
            })
            ->whereRaw('MONTH(`created_at`) = ?', [date('n')])
            ->groupBy(DB::raw('WEEK(`created_at`)'))
            ->orderBy(DB::raw('WEEK(`created_at`)'))
            ->get()
            ->pluck('current_earnings', 'current_week')
            ->toArray();

        $orders_month = [];
        $weeks = 7;
        for ($i = 1; $i <= $weeks; $i++) {
            $orders_month[] = [
                'current_week' => $i,
                'current_earnings' => $orders_current_month[$i] ?? 0,
            ];
        }



        $dishes = Dish::where('restaurant_id', $restaurant_id)->get();

        // Array per contenere i dati per il grafico
        $dishes_orders = [];

        // Per ogni piatto, ottenere la quantità ordinata
        foreach ($dishes as $dish) {
            $quantityOrdered = $dish->orders()->sum('quantity');

            // Costruisci un array associativo con il nome del piatto e la quantità ordinata
            $dishes_orders[] = [
                'dish_name' => $dish->name,
                'quantity_ordered' => $quantityOrdered
            ];
        }
        return view("admin.orders.stats")
            ->with('orders_earnings', $orders_earnings)
            ->with('restaurant', $restaurant)
            ->with('orders_month', $orders_month)
            ->with('dishes_orders', $dishes_orders);
    }
}