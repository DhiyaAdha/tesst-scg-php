<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh seed data
        Item::create([
            'name' => 'Product A',
            'desc' => 'Description of Product A',
            'unit_price' => 50,
            'qty_items' => 100,
            'user_id' => 1,
            'status' => 'ada'
        ]);

        Item::create([
            'name' => 'Product B',
            'desc' => 'Description of Product B',
            'unit_price' => 75,
            'qty_items' => 80,
            'user_id' => 1,
            'status' => 'ada'
        ]);

        Item::create([
            'name' => 'Product C',
            'desc' => 'Description of Product C',
            'unit_price' => 30,
            'qty_items' => 0,
            'user_id' => 1,
            'status' => 'habis'
        ]);
    }
}
