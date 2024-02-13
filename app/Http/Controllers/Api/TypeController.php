<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('name')) {
            $types = Type::where('name', 'like', $request->query('name') . '%')->with(['restaurants'])->get();
        } else {
            $types = Type::with(['restaurants'])->get();

        }


        return response()->json(
            [
                'success'=>true,
                'results'=>$types
            ]
        );
    }
}
