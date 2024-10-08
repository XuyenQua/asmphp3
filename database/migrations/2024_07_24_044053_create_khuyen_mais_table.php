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
        Schema::create('khuyen_mais', function (Blueprint $table) {
            $table->id();
            $table->string('ten_khuyen_mai');
            $table->string('ma_khuyen_mai');
            $table->string('loai_khuyen_mai');
            $table->unsignedInteger('gia_tri');
            $table->unsignedInteger('so_luong');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->string('mo_ta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khuyen_mais');
    }
};
