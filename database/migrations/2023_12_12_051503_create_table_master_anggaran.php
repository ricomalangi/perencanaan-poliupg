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
        Schema::create('tb_master_anggaran', function (Blueprint $table) {
            $table->id();
            $table->string('kode_no_penganggaran');
            $table->string('nama_penganggaran');
            $table->string('kode_penganggran');
            $table->string('sumber_anggaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_master_anggaran');
    }
};
