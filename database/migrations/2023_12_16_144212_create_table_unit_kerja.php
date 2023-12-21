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
        Schema::create('tb_unit_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('uuid_unit_kerja');
            $table->string('uuid_bidang');
            $table->string('nama_unit_kerja');
            $table->string('kode_unit_kerja');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_unit_kerja');
    }
};
