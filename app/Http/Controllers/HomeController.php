<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;



class HomeController extends Controller
{
    public function index()
    {
        $currentUserId = Auth::id();
        if (Auth::user()) {
            $restaurant = Auth::user()->restaurant;
            // dd($restaurant);
            return view('home', compact('restaurant'));
        }

        return view('home');
    }
}
