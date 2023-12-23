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
<<<<<<< HEAD
            $table->string('uuid_proposal');
=======
            $table->string('uuid');
>>>>>>> 9268cef4046a478f16391018e91a7415e1038d2d
            $table->string('uuid_user');
            $table->string('uuid_tahun_anggaran');
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
