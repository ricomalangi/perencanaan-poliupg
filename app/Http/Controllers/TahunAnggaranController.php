<?php

namespace App\Http\Controllers;

use App\Models\TahunAnggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class TahunAnggaranController extends Controller
{
    public function index()
    {
        try {
            $data = TahunAnggaran::orderBy('id', 'desc')->paginate(5);
            $data = [
                'tahun_anggaran' => $data
            ];
            return view('admin.tahun_anggaran.index', $data);
        } catch (Exception $execption) {
            return redirect()->back()->with('error', "Error " . $execption->getMessage());
        }
    }

    public function create()
    {
        try {
            return view('admin.tahun_anggaran.create');
        } catch (Exception $execption) {
            return redirect()->back()->with('error', "Error " . $execption->getMessage());
        }
    }

    public function add(Request $request)
    {
        try {
            $request->validate([
                'tahun' => 'required'
            ]);

            $tahun = $request->tahun;

            $model_tahun = new TahunAnggaran();
            $model_tahun->uuid = Str::uuid();
            $model_tahun->nama_tahun_anggaran = $tahun;
            $model_tahun->save();

            return redirect()->route('admin.tahun_anggaran')->with('success', 'Tahun Anggaran Berhasil Ditambahkan');
        } catch (Exception $execption) {
            return redirect()->route('admin.tahun_anggaran')->with('error', "Error " . $execption->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'tahun' => 'required'
            ]);

            $tahun = $request->tahun;
            $uuid = $request->uuid;
            $model_tahun = TahunAnggaran::where('uuid', $uuid)->firstOrFail();
            $model_tahun->nama_tahun_anggaran = $tahun;
            $model_tahun->save();
            return redirect()->route('admin.tahun_anggaran')->with('success', 'Tahun Anggaran Berhasil Diupdate');
        } catch (Exception $execption) {
            return redirect()->route('admin.tahun_anggaran')->with('error', "Error " . $execption->getMessage());
        }
    }
}
