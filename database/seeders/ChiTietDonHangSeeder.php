<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChiTietDonHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chi_tiet_don_hangs = [];

        for ($i=1; $i <=10 ; $i++) { 
            $chi_tiet_don_hangs[] = [
                'don_hang_id' => rand(1, 10),
                'san_pham_id' => rand(1, 10),
                'so_luong' => fake()->randomNumber(),
                'gia' =>  rand(100000, 10000000),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        };

        DB::table("chi_tiet_don_hangs")->insert($chi_tiet_don_hangs);
    }
}
