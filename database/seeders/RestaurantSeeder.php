<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json = file_get_contents(__DIR__ . '/data/restaurants.json');
        $restaurants = json_decode($json, true);

        foreach ($restaurants as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->vat = $restaurant['vat'];
            $newRestaurant->user_id = $restaurant['user_id'];
            $newRestaurant->slug = Str::slug($restaurant['name'], '-');
            $newRestaurant->image ='restaurants/' . Str::slug($restaurant['name'], '-') . '.jpg';
            $newRestaurant->save();
            $newRestaurant->types()->sync($restaurant['types']);
        }
    }
}
