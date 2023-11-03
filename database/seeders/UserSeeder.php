<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Dhiya',
                'email' => 'dhiya@example.com',
                'password' => bcrypt('password123'),
                'role_id' => null, // karena nullable
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 1,
                'contact' => '081234534890',
            ],
            [
                'name' => 'hamam',
                'email' => 'hamam@example.com',
                'password' => bcrypt('password123'),
                'role_id' => null, // karena nullable
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 2,
                'contact' => '081234567800',
            ],
            [
                'name' => 'eta',
                'email' => 'eta@example.com',
                'password' => bcrypt('password123'),
                'role_id' => null, // karena nullable
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 3,
                'contact' => '081234567890',
            ],
            // Tambahkan data user lainnya dengan kolom yang memiliki nilai nullable
        ];

        DB::table('users')->insert($users);
    }
}
