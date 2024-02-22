<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Dish;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(__DIR__ . '/data/orders.json');
        $orders = json_decode($json, true);
        $dishes = Dish::all();

        foreach ($orders as $order) {
            $newOrder = new Order();

            $newOrder->name = $order['name'];
            $newOrder->surname = $order['surname'];
            $newOrder->address = $order['address'];
            $newOrder->email = $order['email'];
            $newOrder->phone = $order['phone'];
            $newOrder->total_price = $order['total_price'];
            $newOrder->created_at = $order['created_at'];
            $newOrder->updated_at = $order['updated_at'];

            $newOrder->save();

            // $newOrder->dishes()->sync($dishes->pluck('id')->random(1));
            // $newOrder->dishes()->sync($dishes->pluck('id')->random(1));
            $randomDishId = $dishes->pluck('id')->random(1)->first();
            $newOrder->dishes()->sync([$randomDishId => ['quantity' => rand(1, 10)]]);

        }
    }
}
