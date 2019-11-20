<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tandado;

class BobotbaruController extends Controller
{
    public function index()
    {
        $bobotbaru = Tandado::all();
        return view('admin.bobotbaru', compact('bobotbaru'));
    }

    public function delete($id_kategori)
    {
        $ktgr = \App\Kaidah::find($id_kategori);
        $ktgr->delete($ktgr);
        return redirect(route('kaidah'))->with('success', 'Data Berhasil Dihapus');
    }
}
