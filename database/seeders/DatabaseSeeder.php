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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            BannersSeeder::class,
            TrangThaiSeeder::class,
            VaiTroSeeder::class,
            DanhMucSeeder::class,
            KhuyenMaiSeeder::class,
            SanPhamSeeder::class,
            NguoiDungSeeder::class,
            PhuongThucThanhToanSeeder::class,
            DonHangSeeder::class,
            ChiTietDonHangSeeder::class,
            GioHangSeeder::class,
           
          
        ]);
    }
}
