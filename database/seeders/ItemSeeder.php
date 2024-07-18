<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'itemName' => 'Vegetable Salad',
                'dietary' => 'Vegetarian',
                'price' => 5.99,
                'stock' => 10,
            ],
            [
                'itemName' => 'Chicken Sandwich',
                'dietary' =>    'nonVegetarian',
                'price' => 7.99,
                'stock' => 20,
            ]
            ];
        foreach ($items as $item) {
            \App\Models\Item::create($item);
        }
    }
}
