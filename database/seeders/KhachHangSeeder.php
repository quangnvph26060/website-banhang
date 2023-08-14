<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('khachhang')->insert([

        'hoten'=>'van quang',
        'diachi'=>'hanoi',
        'email'=>'quang2003@gmail.com',
        'sdt'=>'09122434',
        'username'=>'admin',
        'password'=>bcrypt('123'),
            'role'=>'1',
        ]);
    }
}
