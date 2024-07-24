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
        $vaitros = [];

        for ($i=1; $i <=10 ; $i++) { 
            $vaitros[] = [
                'ten_vai_tro' => 'vai tro '.$i,
                'quyen_truy_cap' => rand(1,7),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        };

        DB::table("vai_tros")->insert($vaitros);

    }
}
