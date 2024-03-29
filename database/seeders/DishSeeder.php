<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json = file_get_contents(__DIR__ . '/data/dishes.json');
        $dishes = json_decode($json, true);

        foreach ($dishes as $dish) {
            // dd($dish['restaurant_id'][0]);
            for ($i = 0; $i < count($dish['restaurant_id']); ++$i) {
                $newDish = new Dish();
                $newDish->name = $dish['name'];
                $newDish->ingredients = $dish['ingredients'];
                $newDish->price = $dish['price'];
                // $newDish->description = $dish['description'];
                $newDish->restaurant_id = $dish['restaurant_id'][$i];
                $newDish->image = 'dishes/' . Str::slug($dish['name'], '-') . '.jpg';
                $newDish->save();
            }
        }
    }
}
