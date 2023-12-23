<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class UnitKerjaController extends Controller
{
    public function unit_kerja()
    {
        try {
            $data = UnitKerja::paginate(5);
            $data = [
                'unit_kerja' => $data
            ];
            return view('admin.unit_kerja.unit_kerja', $data);
        } catch (Exception $execption) {
            return redirect()->back()->with('error', "Error " . $execption->getMessage());
        }
    }

    public function add()
    {
        try {
            return view('admin.unit_kerja.tambah_unit_kerja');
        } catch (Exception $execption) {
            return redirect()->back()->with('error', "Error " . $execption->getMessage());
        }
    }

    public function doAdd(Request $request)
    {
        try {
            $request->validate([
                'uuid_bidang' => 'required',
                'nama_unit_kerja' => 'required',
                'kode_unit_kerja' => 'required',
            ]);

            $MUnitkerja = new UnitKerja();
            $MUnitkerja->uuid = Str::uuid();
            $MUnitkerja->uuid_bidang = $request->uuid_bidang;
            $MUnitkerja->nama_unit_kerja = $request->nama_unit_kerja;
            $MUnitkerja->kode_unit_kerja = $request->kode_unit_kerja;
            $MUnitkerja->save();

            return redirect()->route('UnitKerja')->with('success', 'Unit Kerja Berhasil Ditambahkan');
        } catch (Exception $execption) {
            return redirect()->route('UnitKerja')->with('error', "Error " . $execption->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'uuid' => 'uuid',
                'uuid_bidang' => 'required',
                'nama_unit_kerja' => 'required',
                'kode_unit_kerja' => 'required',
            ]);

            $uuid = $request->uuid;
            $MUnitkerja = UnitKerja::where('uuid', $uuid)->firstOrFail();

            $MUnitkerja->uuid_bidang = $request->uuid_bidang;
            $MUnitkerja->nama_unit_kerja = $request->nama_unit_kerja;
            $MUnitkerja->kode_unit_kerja = $request->kode_unit_kerja;
            $MUnitkerja->save();

            return redirect()->back()->with('success', 'Unit Kerja Berhasil Diubah');
        } catch (Exception $e) {
            return redirect()->back()->with('error', "Error " . $e->getMessage());
        }
    }
    
    public function delete(Request $request){
        try {
            $uuid = $request->uuid;
            UnitKerja::where('uuid', $uuid)->delete();

            return redirect()->back()->with('success', 'Unit Kerja Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('error', "Error " . $e->getMessage());
        }
    }

    public function get(Request $request)
    {
        try{
            $uuid = $request->query('uuid');
            $data = UnitKerja::where('uuid', $uuid)->first();
            return response()->json($data, 200);
        }
        catch(Exception $e){
            return redirect()->route('admin.unit-kerja')->with('error', "Error " . $e->getMessage());
        }
    }
}
