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
        Schema::create('tb_proposal_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('id_proposal_kegiatan');
            $table->string('id_proposal');
            $table->string('id_iku');
            $table->string('nama_kegiatan');
            $table->boolean('acc_wadir_bidang');
            $table->string('komentar_wadir_bidang');
            $table->boolean('acc_spi');
            $table->string('komentar_spi');
            $table->boolean('acc_keuangan');
            $table->string('komentar_keuangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_proposal_kegiatan');
    }
};
