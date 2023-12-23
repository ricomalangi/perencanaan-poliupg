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
        Schema::create('tb_bidang', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('uuid_bidang');
            $table->string('nama_bidang');
=======
<<<<<<<< HEAD:database/migrations/2023_12_12_051656_create_table_barang.php
            $table->string('uuid_master_anggaran');
            $table->string('nama_barang');
            $table->string('satuan');
            $table->string('harga_min');
            $table->string('harga_max');
========
            $table->string('uuid');
            $table->string('nama_bidang');
>>>>>>>> 9268cef4046a478f16391018e91a7415e1038d2d:database/migrations/2023_12_16_145511_create_table_bidang.php
>>>>>>> 9268cef4046a478f16391018e91a7415e1038d2d
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_bidang');
    }
};
