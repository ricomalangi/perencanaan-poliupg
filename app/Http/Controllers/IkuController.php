<?php

namespace App\Http\Controllers;

use App\Models\Iku;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class IkuController extends Controller
{
    public function iku()
    {
        try {
            $data = Iku::paginate(5);
            $data = [
                'iku' => $data
            ];
            return view('admin.iku.iku', $data);
        } catch (Exception $e) {
            return redirect()->route('admin.iku')->with('error', "Error " . $e->getMessage());
        }
    }

    public function add()
    {
        try {
            return view('admin.iku.tambah_iku');
        } catch (Exception $execption) {
            return redirect()->back()->with('error', "Error " . $execption->getMessage());
        }
    }

    public function doAdd(Request $request)
    {
        try {
            $request->validate([
                'isi_iku' => 'required',
            ]);

            $M_Iku = new Iku();
            $M_Iku->uuid = Str::uuid();
            $M_Iku->isi_iku = $request->isi_iku;
            $M_Iku->save();

            return redirect()->route('admin.iku')->with('success', 'IKU Berhasil Ditambahkan');
        } catch (Exception $execption) {
            return redirect()->route('admin.iku')->with('error', "Error " . $execption->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'uuid' => 'uuid',
                'isi_iku' => 'required',
            ]);

            $uuid = $request->uuid;
            $M_iku = Iku::where('uuid', $uuid)->firstOrFail();

            $M_iku->isi_iku = $request->isi_iku;
            $M_iku->save();

            return redirect()->back()->with('success', 'IKU Berhasil Diubah');
        } catch (Exception $e) {
            return redirect()->back()->with('error', "Error " . $e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            $uuid = $request->uuid;
            Iku::where('uuid', $uuid)->delete();

            return redirect()->back()->with('success', 'IKU Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('error', "Error " . $e->getMessage());
        }
    }

    public function get(Request $request)
    {
        try {
            $uuid = $request->query('uuid');
            $data = Iku::where('uuid', $uuid)->first();
            return response()->json($data, 200);
        } catch (Exception $e) {
            return redirect()->route('admin.iku')->with('error', "Error " . $e->getMessage());
        }
    }
}
