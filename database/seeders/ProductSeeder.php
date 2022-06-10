<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $product = [
            [
                "name" => "Croissant",
                "category" => "food",
                "price" => 32000
            ],
            [
                "name" => "Beef Spaghetti",
                "category" => "food",
                "price" => 30000
            ],
            [
                "name" => "Wrap Chicken",
                "category" => "food",
                "price" => 35000
            ],
            [
                "name" => "Warm vegan",
                "category" => "food",
                "price" => 40000
            ],
            [
                "name" => "Latte Coffee",
                "category" => "drink",
                "price" => 30000
            ],
            [
                "name" => "Espresso",
                "category" => "drink",
                "price" => 35000
            ],
            [
                "name" => "Americano",
                "category" => "drink",
                "price" => 22000
            ],
            [
                "name" => "Caramel Macchiato",
                "category" => "drink",
                "price" => 35000
            ]
        ];
        $id = 1;
        foreach ($product as $pd){
            Product::create([
                
                'name' => $pd['name'],
                'slug' => Str::slug($pd['name']),
                'price' => $pd['price'],
                'image' => 'images/products/'.$id.'.png',
                'description'=> $faker->paragraph($nb =8),
                'category' => $pd['category'],
            ]);
            $id += 1;
        }
    }
}
