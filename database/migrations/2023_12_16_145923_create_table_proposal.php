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
        Schema::create('tb_proposal', function (Blueprint $table) {
            $table->id();
            $table->string('id_proposal');
            $table->string('id_user');
            $table->string('id_tahun_anggaran');
            $table->string('halaman_judul');
            $table->string('halaman_pengesahan');
            $table->string('latar_belakang');
            $table->string('tujuan');
            $table->string('mekanisme');
            $table->string('personel_kegiatan');
            $table->string('status_proposal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_proposal');
    }
};
