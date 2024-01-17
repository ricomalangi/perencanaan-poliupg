<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SatuanController extends Controller
{
    public function index()
    {
        try {
            $data = Satuan::orderBy('id', 'desc')->paginate(5);
            $data = [
                'satuan' => $data
            ];
            return view('admin.satuan.index', $data);

        } catch (Exception $exception) {
            return redirect()->route('admin.satuan')->with('error', 'Error ' . $exception->getMessage());
        }
    }

    public function create()
    {
        return view('admin.satuan.create');
    }

    public function add(Request $request)
    {
        try {
            $request->validate([
                'nama_satuan' => 'required'
            ]);

            $nama_satuan = $request->nama_satuan;

            $model_satuan = new Satuan();
            $model_satuan->uuid = Str::uuid();
            $model_satuan->nama_satuan = $nama_satuan;
            $model_satuan->save();

            return redirect()->route('admin.satuan')->with('success', 'Satuan berhasil ditambahkan');
        } catch (Exception $exception) {
            return redirect()->route('admin.satuan')->with('error', 'Error ' . $exception->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'nama_satuan' => 'required'
            ]);

            $uuid = $request->uuid;
            $nama_satuan = $request->nama_satuan;
            $model_satuan = Satuan::where('uuid', $uuid)->firstOrFail();
            $model_satuan->nama_satuan = $nama_satuan;
            $model_satuan->save();

            return redirect()->route('admin.satuan')->with('success', 'Satuan berhasil diupdate');
        } catch (Exception $exception) {
            return redirect()->route('admin.satuan')->with('error', 'Error ' . $exception->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            $uuid = $request->uuid;

            $model_satuan = Satuan::where('uuid', $uuid)->firstOrFail();
            $model_satuan->delete();
            return redirect()->route('admin.satuan')->with('success', 'Satuan berhasil dihapus');
        } catch (Exception $exception) {
            return redirect()->route('admin.satuan')->with('error', 'Error' . $exception->getMessage());
        }
    }
}
