<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UnitKerja extends Model
{
    use HasFactory;
    protected $table = 'tb_unit_kerja';
    protected $fillable = [
        'uuid',
        'uuid_bidang',
        'nama_unit_kerja',
        'kode_unit_kerja',
    ];

    public function getData($paginate = 10)
    {
        try {
            $results =
                DB::table('tb_unit_kerja as uk')
                ->leftJoin('tb_bidang as b', 'uk.uuid_bidang', '=', 'b.uuid')
                ->select('uk.*', 'b.nama_bidang')
                ->paginate($paginate);
            return $results;
        } catch (Exception $e) {
            return redirect()->route('UnitKerja')->with('error', "Error " . $e->getMessage());
        }
    }
}
