<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'tb_barang';

    protected $fillable = [
        'id_master_anggaran',
        'nama_barang',
        'satuan',
        'harga_min',
        'harga_max',
    ];
}
