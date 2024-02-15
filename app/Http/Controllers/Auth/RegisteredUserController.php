<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Type;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Throwable;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $types = Type::all();
        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'restaurant_name' => ['required', 'max:255'],
            'image' => ['image', 'max:4000', 'mimes:jpg'],
            'vat' => ['required','min:11', 'max:11', 'unique:restaurants'],
            'address' => ['required', 'max:255'],
            'types'=> ['required', 'exists:types,id'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $formDataRestaurant =[
            'name' => $request['restaurant_name'],
            'vat' => $request['vat'],
            'address' => $request['address'],
            'user_id' => $user->id,
        ];
        $slug = Str::slug($request['restaurant_name'], '-');
        $formDataRestaurant['slug'] = $slug;


        if ($request->hasFile('image')) {
            $name = Str::slug($request['restaurant_name'], '-') . '.jpg';
            $img_path = Storage::putFileAs('restaurants', $request['image'], $name);
            $formDataRestaurant['image'] = $img_path;
        } else {
            $formDataRestaurant['image'] = 'restaurants/restaurant-placeholder.jpg';
        }
        $newRestaurant = Restaurant::create($formDataRestaurant);
        $newRestaurant->types()->attach($request->types);


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
