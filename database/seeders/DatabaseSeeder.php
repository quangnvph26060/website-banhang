<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//             'password'=>bcrypt('12345'),
//             'sdt'=>'09343344',
//             'diachi'=>'hanoi',
//             'role'=>1,
//         ]);
        $this->call([
            LoaiSeeder::class,
            SanPhamSeeder::class,
            SettingSeeder::class,
            KhachHangSeeder::class,
            UserSeeder::class,
            GioHangSeeder::class,
        ]);
    }
}
