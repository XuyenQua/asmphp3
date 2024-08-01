<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KhuyenMaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $khuyen_mais = [];

        for ($i=1; $i <=10 ; $i++) { 
            $khuyen_mais[] = [
                "ten_khuyen_mai"=> 'khuyen mai '.$i,
                "ma_khuyen_mai"=> 'KM'.$i,
                'loai_khuyen_mai'=> 'gia_tri',
                'gia_tri'=> rand(10000,100000),
                'so_luong'=> rand(1,1000),
                'ngay_bat_dau'=> fake()->date(),
                'ngay_ket_thuc'=> fake()->date(),
                'mo_ta'=> fake()->text(),
                'trang_thai_id'=> rand(1,10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        };

        DB::table("khuyen_mais")->insert($khuyen_mais);
    }
}
