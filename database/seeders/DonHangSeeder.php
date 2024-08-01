<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DonHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $don_hangs = [];

        for ($i=1; $i <=10 ; $i++) { 
            $don_hangs[] = [
                'nguoi_dung_id' => rand(1, 10),
                'ngay_dat'=> fake()->date(),
                'tong_tien'=> rand(100000, 10000000),
                'phuong_thuc_thanh_toan'=> rand(1,4),
                'khuyen_mai'=> rand(1,4),
                'trang_thai_id'=> rand(1,10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        };

        DB::table("don_hangs")->insert($don_hangs);
    }
}
