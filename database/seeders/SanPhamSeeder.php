<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('sanpham')->insert([
           'tensanpham'=>'ip12',
           'gia'=>124,
           'mota'=>'depvc',
           'luotxem'=>'123',
           'image'=>'1.jpg',
           'soluong'=>'1000',
           'id_loai'=>1
       ]);
    }
}
