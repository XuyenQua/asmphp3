<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nguoi_dungs = [];

        for ($i=1; $i <=10 ; $i++) { 
            $nguoi_dungs[] = [
                'vai_tro_id' => 1,
                'ten_nguoi_dung' => fake()->userName(),
                'mat_khau' =>  Hash::make('password'),
                'email' => fake()->unique()->safeEmail(),
                'so_dien_thoai'=> fake()->phoneNumber(),
                'dia_chi'=> fake()->address(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        };

        DB::table("nguoi_dungs")->insert($nguoi_dungs);
    }
}
