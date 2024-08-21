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
        $trangthais = [
            [
                'ten_trang_thai' => 'Đặt hàng',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_trang_thai' => 'Đang xử lý',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_trang_thai' => 'Đang giao hàng',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_trang_thai' => 'Đã giao hàng',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_trang_thai' => 'Đã hủy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_trang_thai' => 'Trả hàng',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_trang_thai' => 'Đang hoàn tiền',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        

        DB::table("trang_thais")->insert($trangthais);

    }
}
