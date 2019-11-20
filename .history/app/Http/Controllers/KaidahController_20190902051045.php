<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorido;

class KaidahController extends Controller
{
    public function index()
    {
        $kaidah = Kategorido::all();
        return view('admin.kaidah', compact('kaidah'));
    }

    public function delete($id_kategori)
    {
        $ktgr = \App\Kaidah::find($id_kategori);
        $ktgr->delete($ktgr);
        return redirect(route('kaidah'))->with('success', 'Data Berhasil Dihapus');
    }

    // public function show(Kaidah $id_kategori)
    // {

    // }
    
}
