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
        Schema::create('tb_proposal_kegiatan_anggaran', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('uuid_proposal_kegiatan');
            $table->string('uuid_jenis_sub_anggaran');
            $table->string('jumlah_ajuan');
            $table->string('harga_ajuan');
            $table->string('jam_ajuan');
            $table->string('luasan_ajuan');
            $table->string('link_referensi');
            $table->string('anggaran_acc_wadir_bidang');
            $table->string('anggaran_komentar_wadir_bidang');
            $table->string('anggaran_acc_spi');
            $table->string('anggaran_komentar_spi');
            $table->string('anggaran_acc_keuangan');
            $table->string('anggaran_komentar_keuangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_proposal_kegiatan_anggaran');
    }
};
