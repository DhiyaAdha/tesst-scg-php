<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OutboundTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OutboundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OutboundTransaction::create([
            'item_id' => 1,
            'outbound_date' => '2023-11-25',
            'qty_sold' => 20,
            'customer_id' => 2,
            'user_id' => 1
        ]);

        OutboundTransaction::create([
            'item_id' => 2,
            'outbound_date' => '2023-12-30',
            'qty_sold' => 15,
            'customer_id' => 1,
            'user_id' => 1
        ]);
    }
}
