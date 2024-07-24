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
        Schema::create('nguoi_dungs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vai_tro_id');
            $table->foreign('vai_tro_id')->references('id')->on('vai_tros');
            $table->string('ten_nguoi_dung')->unique()->nullable();
            $table->string('mat_khau');
            $table->string('ho_ten');
            $table->string('email');
            $table->string('so_dien_thoai');
            $table->text('dia_chi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguoi_dungs');
    }
};
