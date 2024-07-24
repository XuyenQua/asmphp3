<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $san_phams = [];

        for ($i=0; $i <=10 ; $i++) { 
            $san_phams[] = [
                'danh_muc_id' => rand(1,10),
                'ten_san_pham' => 'san pham '.$i,
                'gia' =>  rand(100000,10000000),
                'so_luong' => fake()->randomNumber(),
                'hinh_anh' => fake()->imageUrl(),
                'mo_ta_ngan'=> fake()->text(),
                'chi_tiet_san_pham'=> fake()->text(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        };

        DB::table("san_phams")->insert($san_phams);
 
    }
}
