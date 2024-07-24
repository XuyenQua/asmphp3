<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [];

        for ($i=1; $i <=10 ; $i++) { 
            $banners[] = [
                'ten_banner' => "banner ".$i,
                'hinh_anh' => fake()->imageUrl(),
                'vi_tri' => fake()->randomElement(['top', 'middle', 'bottom']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('banners')->insert($banners);
    }
}
