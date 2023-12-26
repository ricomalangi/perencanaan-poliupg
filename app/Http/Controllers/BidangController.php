<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BidangController extends Controller
{
    public function index()
    {
        try {
            $data = Bidang::orderBy('id', 'desc')->paginate(5);
            $data = [
                'nama_bidang' => $data
            ];
            return view('admin.bidang.index', $data);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', "Error " . $exception->getMessage());
        }
    }

    public function create()
    {

        return view('admin.bidang.create');
    }

    public function add(Request $request)
    {
        try {
            $request->validate([
                'nama_bidang' => 'required'
            ]);

            $nama_bidang = $request->nama_bidang;

            $bidang = new Bidang();
            $bidang->uuid = Str::uuid();
            $bidang->nama_bidang = $nama_bidang;
            $bidang->save();

            return redirect()->route('admin.data_bidang')->with('success', 'Bidang berhasil ditambah');
        } catch (Exception $exception) {
            return redirect()->route('admin.data_bidang')->with('error', "Error " . $exception->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'nama_bidang' => 'required'
            ]);

            $uuid = $request->uuid;
            $nama_bidang = $request->nama_bidang;
            $model_bidang = Bidang::where('uuid', $uuid)->firstOrFail();
            $model_bidang->nama_bidang = $nama_bidang;
            $model_bidang->save();
            return redirect()->route('admin.data_bidang')->with('success', 'Bidang berhasil diupdate');
        } catch (Exception $exception) {
            return redirect()->route('admin.data_bidang')->with('error', "Error " . $exception->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            $uuid = $request->uuid;

            $model_bidang = Bidang::where('uuid', $uuid)->firstOrFail();
            $model_bidang->delete();
            return redirect()->route('admin.data_bidang')->with('success', 'Bidang berhasil dihapus');
        } catch (Exception $exception) {
            return redirect()->route('admin.data_bidang')->with('error', "Error " . $exception->getMessage());
        }
    }
}
