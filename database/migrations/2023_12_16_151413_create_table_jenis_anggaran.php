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
        Schema::create('tb_jenis_anggaran', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('uuid_jenis_anggaran');
=======
            $table->string('uuid');
>>>>>>> 9268cef4046a478f16391018e91a7415e1038d2d
            $table->string('nomor_anggaran');
            $table->string('nama_anggaran');
            $table->string('kode_anggaran');
            $table->string('sumber_anggaran');
            $table->string('jenis_akun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jenis_anggaran');
    }
};
