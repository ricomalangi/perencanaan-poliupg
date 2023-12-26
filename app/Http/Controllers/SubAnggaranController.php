<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubAnggaran;
use App\Models\JenisAnggaran;
use Exception;
use Illuminate\Support\Str;

class SubAnggaranController extends Controller
{
    public function index()
    {
        try {
            $dataSub = SubAnggaran::join('tb_jenis_anggaran', 'tb_jenis_anggaran.uuid', '=', 'tb_jenis_anggaran_sub.uuid_jenis_anggaran')
            ->select('tb_jenis_anggaran_sub.uuid as uuid_sub_anggaran','tb_jenis_anggaran.nomor_anggaran','tb_jenis_anggaran_sub.nama_sub_anggaran','tb_jenis_anggaran_sub.satuan_anggaran', 'tb_jenis_anggaran.*') 
            ->paginate(5);
            

            $data = [
                'sub_anggaran' => $dataSub
            ];

            return view('admin.jenis_anggaran_sub.index', $data);
        } catch (Exception $execption) {
            return redirect()->back()->with('error', "Error " . $execption->getMessage());
        }
    }
    public function create()
    {
        try {
            $data = JenisAnggaran::orderBy('id', 'desc')->get();
            $data = [
                'jenis_anggaran' => $data
            ];

            return view('admin.jenis_anggaran_sub.create', $data);
        } catch (Exception $execption) {
            return redirect()->back()->with('error', "Error " . $execption->getMessage());
        }
    }

    public function edit($uuid)
    {

        try {         
            $data = SubAnggaran::where('uuid', $uuid)->firstOrFail();
            $uuid_jenis_anggaran = $data->uuid_jenis_anggaran;
            $dataJenis = JenisAnggaran::where('uuid', $uuid_jenis_anggaran)->firstOrFail();

            $data = [
                'sub_anggaran' => $data,
                'jenis_anggaran' => $dataJenis
            ];
          
            return view('admin.jenis_anggaran_sub.edit', $data);

        } catch (Exception $execption) {
            return redirect()->back()->with('error', "Error " . $execption->getMessage());
        }
    }
    public function lihat($uuid)
    {

        try {         
            $data = SubAnggaran::where('uuid', $uuid)->firstOrFail();
            $uuid_jenis_anggaran = $data->uuid_jenis_anggaran;
            $dataJenis = JenisAnggaran::where('uuid', $uuid_jenis_anggaran)->firstOrFail();

            $data = [
                'sub_anggaran' => $data,
                'jenis_anggaran' => $dataJenis
            ];
            
            return view('admin.jenis_anggaran_sub.lihat', $data);

        } catch (Exception $execption) {
            return redirect()->back()->with('error', "Error " . $execption->getMessage());
        }
    }



    public function add(Request $request)
    {
        try {
            // dd($request);
            $request->validate([
                'nama_sub_anggaran' => 'required',
                'satuan_anggaran' => 'required',
                'uuid_jenis_anggaran' => 'required'
            ]);


            $nama_sub_anggaran = $request->nama_sub_anggaran;
            $uuid_jenis_anggaran = $request->uuid_jenis_anggaran;
            $satuan_anggaran = $request->satuan_anggaran;
            $harga_min = $request->harga_min;
            $harga_max = $request->harga_max;
            $luasan = $request->luasan;


            $model_anggaran = new SubAnggaran();
            $model_anggaran->uuid = Str::uuid();
            $model_anggaran->uuid_jenis_anggaran = $uuid_jenis_anggaran;
            $model_anggaran->nama_sub_anggaran = $nama_sub_anggaran;
            $model_anggaran->satuan_anggaran = $satuan_anggaran;
            $model_anggaran->harga_min = $harga_min;
            $model_anggaran->harga_max = $harga_max;
            $model_anggaran->luasan = $luasan;
            $model_anggaran->save();


            return redirect()->route('admin.sub_anggaran')->with('success', 'Sub Jenis Anggaran Berhasil Ditambahkan');
        } catch (Exception $execption) {
            return redirect()->route('admin.sub_anggaran')->with('error', "Error " . $execption->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {

            // dd($request);
            $request->validate([
                'uuid' => 'required',
                'nama_sub_anggaran' => 'required',
                'satuan_anggaran' => 'required'
            ]);

            $uuid = $request->uuid;
            $nama_sub_anggaran = $request->nama_sub_anggaran;
            $satuan_anggaran = $request->satuan_anggaran;
            $harga_min = $request->harga_min;
            $harga_max = $request->harga_max;
            $luasan = $request->luasan;
     

            $model_anggaran = SubAnggaran::where('uuid', $uuid)->firstOrFail();;
            $model_anggaran->nama_sub_anggaran = $nama_sub_anggaran;
            $model_anggaran->satuan_anggaran = $satuan_anggaran;
            $model_anggaran->harga_min = $harga_min;
            $model_anggaran->harga_max = $harga_max;
            $model_anggaran->luasan = $luasan;
            $model_anggaran->save();

            return redirect()->route('admin.sub_anggaran')->with('success', 'Sub Jenis Anggaran Berhasil Diupdate');
        } catch (Exception $execption) {
            return redirect()->route('admin.sub_anggaran')->with('error', "Error " . $execption->getMessage());
        }
    }
    public function delete(Request $request)
    {
        try {
            $request->validate([
                'uuid' => 'required',
            ]);

            $uuid = $request->uuid;
           
            $model_anggaran = SubAnggaran::where('uuid', $uuid)->firstOrFail();;
            $model_anggaran->uuid = $uuid;
            $model_anggaran->delete();

            return redirect()->route('admin.sub_anggaran')->with('success', 'Sub Jenis Anggaran Berhasil Didelete');
        } catch (Exception $execption) {
            return redirect()->route('admin.sub_anggaran')->with('error', "Error " . $execption->getMessage());
        }
    }
}
