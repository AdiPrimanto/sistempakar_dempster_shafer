<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahkategoriController extends Controller
{
    public function index($id_kategori)
    {
        $tanda      = Tandado::all();
        return view('admin.tambahbobot', compact('kategori','tanda'));
    }

    public function insert(Request $request)
    {
        $submit = new Bobot();
        $submit->id_kategori = $request->id_kategori;
        $submit->id_tanda = $request->id_tanda;
        $submit->save();
        return redirect('/kaidah');
    }
}
