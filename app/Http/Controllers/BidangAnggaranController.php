<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\BidangAnggaran;
use App\Models\TahunAnggaran;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class BidangAnggaranController extends Controller
{
    public function index()
    {
        try {
            $bidang = Bidang::get();
            $tahun_anggaran = TahunAnggaran::get();
           $data = DB::table('tb_bidang_anggaran')
                        ->join('tb_bidang', 'tb_bidang.uuid', '=', 'tb_bidang_anggaran.uuid_bidang')
                        ->join('tb_tahun_anggaran', 'tb_tahun_anggaran.uuid', '=', 'tb_bidang_anggaran.uuid_tahun_anggaran')
                        ->select('tb_bidang.nama_bidang', 'tb_tahun_anggaran.nama_tahun_anggaran', 'tb_bidang_anggaran.jumlah_alokasi', 'tb_bidang_anggaran.uuid', 'tb_bidang_anggaran.uuid_bidang', 'tb_bidang_anggaran.uuid_tahun_anggaran')
                        ->orderBy('tb_bidang_anggaran.id', 'desc')->paginate(5);
            $data = [
                'bidang_anggaran' => $data,
                'bidang' => $bidang,
                'tahun_anggaran' => $tahun_anggaran,
            ];
            // dd($data);
            return view('admin.bidang_anggaran.index', $data);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', "Error " . $exception->getMessage());
        }
    }

    public function create()
    {
        $bidang = Bidang::get();
        $tahun_anggaran = TahunAnggaran::get();
        $data = [
            'bidang' => $bidang,
            'tahun_anggaran' => $tahun_anggaran
        ];
        return view('admin.bidang_anggaran.create', $data);
    }

    public function add(Request $request)
    {
        try {
            $request->validate([
                'nama_bidang' => 'required',
                'tahun_anggaran' => 'required',
                'jumlah_alokasi' => 'required',
            ]);

            $uuid_bidang = $request->nama_bidang;
            $uuid_tahun_anggaran = $request->tahun_anggaran;
            $jumlah_alokasi = $request->jumlah_alokasi;

            $bidang_anggaran = new BidangAnggaran();
            $bidang_anggaran->uuid = Str::uuid();
            $bidang_anggaran->uuid_bidang = $uuid_bidang;
            $bidang_anggaran->uuid_tahun_anggaran = $uuid_tahun_anggaran;
            $bidang_anggaran->jumlah_alokasi = $jumlah_alokasi;
            $bidang_anggaran->save();
            

            return redirect()->route('admin.bidang_anggaran')->with('success', 'Bidang anggaran berhasil ditambah');
        } catch (Exception $exception) {
            return redirect()->route('admin.bidang_anggaran')->with('error', "Error " . $exception->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'nama_bidang' => 'required',
                'tahun_anggaran' => 'required',
                'jumlah_alokasi' => 'required',
            ]);

            $uuid = $request->uuid;
            $bidang = $request->nama_bidang;
            $tahun_anggaran = $request->tahun_anggaran;
            $jumlah_alokasi = $request->jumlah_alokasi;
            $model_bidang_anggaran = BidangAnggaran::where('uuid', $uuid)->firstOrFail();
            $model_bidang_anggaran->uuid_bidang = $bidang;
            $model_bidang_anggaran->uuid_tahun_anggaran = $tahun_anggaran;
            $model_bidang_anggaran->jumlah_alokasi = $jumlah_alokasi;
            $model_bidang_anggaran->save();

            return redirect()->route('admin.bidang_anggaran')->with('success', 'Bidang anggaran berhasil diupdate');
        } catch (Exception $exception) {
            return redirect()->route('admin.bidang_anggaran')->with('error', "Error " . $exception->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            $uuid = $request->uuid;

            $model_bidang_anggaran = BidangAnggaran::where('uuid', $uuid)->firstOrFail();
            $model_bidang_anggaran->delete();
            return redirect()->route('admin.bidang_anggaran')->with('success', 'Bidang berhasil dihapus');
        } catch (Exception $exception) {
            return redirect()->route('admin.bidang_anggaran')->with('error', "Error " . $exception->getMessage());
        }
    }
}
