<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function dashboard(Request $request){
        return view('welcome');
    }

    public function barang(Request $request){
        $data_barang = Barang::paginate(10);
        return view('barang', compact('data_barang'));
    }
}
