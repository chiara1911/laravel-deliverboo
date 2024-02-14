<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;


class RestaurantController extends Controller
{
    public function index(Request $request)
    {



        $restaurants = Restaurant::with(['types'])->get();
        return response()->json(
            [
                'success'=>true,
                'results'=>$restaurants
            ]
        );
    }

    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->with(['types', 'dishes'])->first();
        return response()->json(
            [
                'success' => true,
                'results' => $restaurant
            ]
        );
    }
}