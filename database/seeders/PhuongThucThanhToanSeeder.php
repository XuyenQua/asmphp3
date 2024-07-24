<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PhuongThucThanhToanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $phuong_thuc_thanh_toans = [];

        for ($i=0; $i <=3 ; $i++) { 
            $phuong_thuc_thanh_toans[] = [
                "ten_phuong_thuc_thanh_toan"=> "phuong thuc thanh toan ".$i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        };

        DB::table("phuong_thuc_thanh_toans")->insert($phuong_thuc_thanh_toans);
    }
}
