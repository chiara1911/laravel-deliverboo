<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\User;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $currentUserId = Auth::id();
        if (Auth::user()) {
            $restaurant = Auth::user()->restaurant;
            return view('home', compact('restaurant'));
        }
        // dd($restaurant);

        return view('home');
    }
}
