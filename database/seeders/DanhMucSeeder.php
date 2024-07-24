<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $danh_mucs = [];

        for ($i=1; $i <=10 ; $i++) { 
            $danh_mucs[] = [
                'ten_danh_muc' => 'danh muc '.$i,
                'mo_ta' => fake()->text(),
                'hinh_anh' => fake()->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        };

        DB::table("danh_mucs")->insert($danh_mucs);

    }
}
