<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisAnggaran;
use Exception;
use Illuminate\Support\Str;


class JenisAnggaranController extends Controller
{
    public function index()
    {
        try {
            $data = JenisAnggaran::orderBy('id', 'desc')->paginate(5);
            $data = [
                'jenis_anggaran' => $data
            ];
            return view('admin.jenis_anggaran.index', $data);
        } catch (Exception $execption) {
            return redirect()->back()->with('error', "Error " . $execption->getMessage());
        }
    }
    public function create()
    {
        try {
            return view('admin.jenis_anggaran.create');
        } catch (Exception $execption) {
            return redirect()->back()->with('error', "Error " . $execption->getMessage());
        }
    }

    public function add(Request $request)
    {
        try {
            $request->validate([
                'nomor_anggaran' => 'required',
                'nama_anggaran' => 'required',
                'kode_anggaran' => 'required',
                'sumber_anggaran' => 'required',
                'jenis_akun' => 'required'
            ]);

            $nomor_anggaran = $request->nomor_anggaran;
            $nama_anggaran = $request->nama_anggaran;
            $kode_anggaran = $request->kode_anggaran;
            $sumber_anggaran = $request->sumber_anggaran;
            $jenis_akun = $request->jenis_akun;

            $model_anggaran = new JenisAnggaran();
            $model_anggaran->uuid = Str::uuid();
            $model_anggaran->nomor_anggaran = $nomor_anggaran;
            $model_anggaran->nama_anggaran = $nama_anggaran;
            $model_anggaran->kode_anggaran = $kode_anggaran;
            $model_anggaran->sumber_anggaran = $sumber_anggaran;
            $model_anggaran->jenis_akun = $jenis_akun;
            $model_anggaran->save();

            return redirect()->route('admin.jenis_anggaran')->with('success', 'Tahun Anggaran Berhasil Ditambahkan');
        } catch (Exception $execption) {
            return redirect()->route('admin.jenis_anggaran')->with('error', "Error " . $execption->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'uuid' => 'required',
                'nomor_anggaran' => 'required',
                'nama_anggaran' => 'required',
                'kode_anggaran' => 'required',
                'sumber_anggaran' => 'required',
                'jenis_akun' => 'required'
            ]);

            $uuid = $request->uuid;
            $nomor_anggaran = $request->nomor_anggaran;
            $nama_anggaran = $request->nama_anggaran;
            $kode_anggaran = $request->kode_anggaran;
            $sumber_anggaran = $request->sumber_anggaran;
            $jenis_akun = $request->jenis_akun;

            $model_anggaran = JenisAnggaran::where('uuid', $uuid)->firstOrFail();;
            $model_anggaran->nomor_anggaran = $nomor_anggaran;
            $model_anggaran->nama_anggaran = $nama_anggaran;
            $model_anggaran->kode_anggaran = $kode_anggaran;
            $model_anggaran->sumber_anggaran = $sumber_anggaran;
            $model_anggaran->jenis_akun = $jenis_akun;
            $model_anggaran->save();

            return redirect()->route('admin.jenis_anggaran')->with('success', 'Jenis Anggaran Berhasil Diupdate');
        } catch (Exception $execption) {
            return redirect()->route('admin.jenis_anggaran')->with('error', "Error " . $execption->getMessage());
        }
    }
    public function delete(Request $request)
    {
        try {
            $request->validate([
                'uuid' => 'required',
            ]);

            $uuid = $request->uuid;
           
            $model_anggaran = JenisAnggaran::where('uuid', $uuid)->firstOrFail();;
            $model_anggaran->uuid = $uuid;
            $model_anggaran->delete();

            return redirect()->route('admin.jenis_anggaran')->with('success', 'Tahun Anggaran Berhasil Didelete');
        } catch (Exception $execption) {
            return redirect()->route('admin.jenis_anggaran')->with('error', "Error " . $execption->getMessage());
        }
    }
    

}
