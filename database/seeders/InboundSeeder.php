<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InboundTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InboundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tambahkan data sesuai kebutuhan
        InboundTransaction::create([
            'item_id' => 1, // Sesuaikan dengan ID item
            'inbound_date' => '2023-10-20', // Tanggal inbound
            'qty_received' => 50, // Jumlah barang yang diterima
            'supplier_id' => 2, // ID supplier, jika ada
            'user_id' => 1,
            'created_at' => now(),
        ]);

        InboundTransaction::create([
            'item_id' => 2,
            'inbound_date' => '2023-11-15',
            'qty_received' => 30,
            'supplier_id' => 3,
            'user_id' => 1,
            'created_at' => now(),
        ]);

        InboundTransaction::create([
            'item_id' => 3,
            'inbound_date' => '2023-12-05',
            'qty_received' => 70,
            'supplier_id' => 1,
            'user_id' => 1,
            'created_at' => now(),
        ]);
    }
}
