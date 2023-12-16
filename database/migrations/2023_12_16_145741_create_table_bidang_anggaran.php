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
        Schema::create('tb_bidang_anggaran', function (Blueprint $table) {
            $table->id();
            $table->string('id_bidang_anggaran');
            $table->string('id_bidang');
            $table->string('id_tahun_anggaran');
            $table->string('jumlah_alokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_bidang_anggaran');
    }
};
