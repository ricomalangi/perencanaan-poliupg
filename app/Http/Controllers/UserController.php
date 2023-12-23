<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function users()
    {
        try {
            $user_model = new User();
            $data = $user_model->getData(8);
            $unitKerja = DB::table('tb_unit_kerja')->select('uuid', 'nama_unit_kerja')->get();
            $data = [
                'dataUsers' => $data,
                'unitKerja' => $unitKerja,
            ];
            return view('admin.users.users', $data);
        } catch (Exception $e) {
            return redirect()->route('admin.users')->with('error', "Error " . $e->getMessage());
        }
    }

    public function add()
    {
        try {
            $unitKerja = DB::table('tb_unit_kerja')->select('uuid', 'nama_unit_kerja')->get();
            $data = [
                'unitKerja' => $unitKerja
            ];
            return view('admin.users.tambah_user', $data);
        } catch (Exception $execption) {
            return redirect()->back()->with('error', "Error " . $execption->getMessage());
        }
    }

    public function doAdd(Request $request)
    {
        try {
            $request->validate([
                'uuid_unit_kerja' => 'required',
                'nama_user' => 'required',
                'username' => 'required',
                'password' => 'required',
                'email' => 'required|email',
                'no_telp' => 'required',
                'level' => 'required',
                'status' => 'required',
            ]);

            $MUsers = new User();

            $MUsers->uuid = Str::uuid();
            $MUsers->uuid_unit_kerja = $request->uuid_unit_kerja;
            $MUsers->nama_user = $request->nama_user;
            $MUsers->username = $request->username;
            $MUsers->password = $request->password;
            $MUsers->email = $request->email;
            $MUsers->no_telp = $request->no_telp;
            $MUsers->level_user = $request->level;
            $MUsers->status = $request->status;

            $MUsers->save();

            return redirect()->route('dataUser')->with('success', 'User Baru Berhasil Ditambahkan');
        } catch (Exception $execption) {
            return redirect()->route('dataUser')->with('error', "Error " . $execption->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'uuid' => 'required',
                'uuid_unit_kerja' => 'required',
                'nama_user' => 'required',
                'username' => 'required',
                'password' => 'required',
                'email' => 'required|email',
                'no_telp' => 'required',
                'level' => 'required',
                'status' => 'required',
            ]);

            $uuid = $request->uuid;
            $M_User = User::where('uuid', $uuid)->firstOrFail();

            $M_User->uuid_unit_kerja = $request->uuid_unit_kerja;
            $M_User->nama_user = $request->nama_user;
            $M_User->username = $request->username;
            $M_User->password = $request->password;
            $M_User->email = $request->email;
            $M_User->no_telp = $request->no_telp;
            $M_User->level_user = $request->level;
            $M_User->status = $request->status;
            $M_User->save();

            return redirect()->back()->with('success', 'User Berhasil Diubah');
        } catch (Exception $e) {
            return redirect()->back()->with('error', "Error " . $e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            $uuid = $request->uuid;
            User::where('uuid', $uuid)->delete();

            return redirect()->back()->with('success', 'User Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('error', "Error " . $e->getMessage());
        }
    }

    public function get(Request $request)
    {
        try {
            $uuid = $request->query('uuid');
            $user_model = new User();
            $data = $user_model->getDataEdit($uuid);
            return response()->json($data, 200);
        } catch (Exception $e) {
            return redirect()->route('dataUser')->with('error', "Error " . $e->getMessage());
        }
    }
}
