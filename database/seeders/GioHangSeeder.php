<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GioHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gio_hangs = [];

        for ($i=1; $i <=10 ; $i++) { 
            $gio_hangs[] = [
                'san_pham_id' => rand(1, 10),
                'nguoi_dung_id' => rand(1, 10),
                'so_luong'=> rand(0,10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        };

        DB::table("gio_hangs")->insert($gio_hangs);
    }
}
