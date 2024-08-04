<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaiTroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vaitros = [
            [
                'ten_vai_tro' => 'người dùng',
                'quyen_truy_cap' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_vai_tro' => 'Nhân viên',
                'quyen_truy_cap' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_vai_tro' => 'Admin',
                'quyen_truy_cap' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        

        DB::table("vai_tros")->insert($vaitros);

    }
}
