<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_items')->insert([

            'id_order'=>1,
            'id_sanpham'=>2,
            'quantity'=>2,
            'total_price'=>1000,
        ]);
    }
}
