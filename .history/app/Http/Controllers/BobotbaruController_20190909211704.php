<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\

class BobotbaruController extends Controller
{
    public function index()
    {
        $bobotbaru = Kategorido::all();
        return view('admin.kaidah', compact('kaidah'));
    }

    public function delete($id_kategori)
    {
        $ktgr = \App\Kaidah::find($id_kategori);
        $ktgr->delete($ktgr);
        return redirect(route('kaidah'))->with('success', 'Data Berhasil Dihapus');
    }
}
