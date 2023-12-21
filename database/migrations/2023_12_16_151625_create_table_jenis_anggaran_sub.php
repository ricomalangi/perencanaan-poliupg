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
        Schema::create('tb_jenis_anggaran_sub', function (Blueprint $table) {
            $table->id();
            $table->string('uuid_jenis_sub_anggaran');
            $table->string('uuid_jenis_anggaran');
            $table->string('nama_sub_anggaran');
            $table->string('satuan_anggaran');
            $table->string('harga_max');
            $table->string('harga_min');
            $table->string('jam');
            $table->string('luasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jenis_anggaran_sub');
    }
};
