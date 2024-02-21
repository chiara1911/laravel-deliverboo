<?php

namespace App\Http\Controllers\Api\Dishes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
class DishController extends Controller
{
    //
    public function index (Request $request){
        $dishes = Dish::all();
        return response()->json($dishes,200);
;    }
}
