<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Type;


class RestaurantController extends Controller
{
    public function index(Request $request)
    {
                
        if(!empty($request->query('types'))) {
            $checkedTypes = $request->query('types'); 
            $restaurants = Restaurant::with('types')->whereHas('types', function ($q) use ($checkedTypes) {
                $q->whereIn('types.id', $checkedTypes);              
            })->get();
        } else {
            $restaurants = Restaurant::with(['types'])->get();
        }       

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
