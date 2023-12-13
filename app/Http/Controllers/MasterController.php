<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Exception;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('welcome');
    }

    public function barang(Request $request)
    {
        $data_barang = Barang::paginate(10);
        return view('barang', compact('data_barang'));
    }

    public function inputBarang(Request $request)
    {
        try {
            $request->validate([
                'nama_barang' => 'required',
                'satuan' => 'required',
                'h_min' => 'required',
                'h_max' => 'required',
            ]);

            $barang = new Barang();

            $barang = new Barang();
            $barang->id_master_anggaran = rand(5656, 7890);
            $barang->nama_barang = $request->nama_barang;
            $barang->satuan = $request->satuan;
            $barang->harga_min = $request->h_min;
            $barang->harga_max = $request->h_max;

            $barang->save();

            return redirect()->back()->with('success', 'Data Berhasil Ditambahkan.');
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function getDataBarang(Request $request)
    {
        try {
            $id = $request->id;
            $data = Barang::where('id', $id)->get();
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
