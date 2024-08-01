<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nguoi_dung_id');
            $table->foreign('nguoi_dung_id')->references('id')->on('nguoi_dungs');
            $table->date('ngay_dat');
            $table->double('tong_tien');
            $table->unsignedBigInteger('phuong_thuc_thanh_toan');
            $table->foreign('phuong_thuc_thanh_toan')->references('id')->on('phuong_thuc_thanh_toans');
            $table->unsignedBigInteger('khuyen_mai');
            $table->foreign('khuyen_mai')->references('id')->on('khuyen_mais');
            $table->unsignedBigInteger('trang_thai_id');
            $table->foreign('trang_thai_id')->references('id')->on('trang_thais');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
