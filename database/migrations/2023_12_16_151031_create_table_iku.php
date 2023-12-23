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
        Schema::create('tb_iku', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('uuid_iku');
=======
            $table->string('uuid');
>>>>>>> 9268cef4046a478f16391018e91a7415e1038d2d
            $table->string('isi_iku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_iku');
    }
};
