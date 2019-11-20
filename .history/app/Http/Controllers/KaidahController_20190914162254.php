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

    public function delete($id_tanda)
    {
        $ktgr = \App\Bobotbaru::find($id_tanda);
        $ktgr->delete($ktgr);
        return redirect(route('kaidah'))->with('success', 'Data Berhasil Dihapus');
    }
    
}
