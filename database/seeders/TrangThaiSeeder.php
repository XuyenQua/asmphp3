<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TrangThaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trangthais = [];

        for ($i=1; $i <=10 ; $i++) { 
            $trangthais[] = [
                'ten_trang_thai' => 'trang thai '.$i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        };

        DB::table("trang_thais")->insert($trangthais);

    }
}
