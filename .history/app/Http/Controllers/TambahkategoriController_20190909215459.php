<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tandado;
use App\Kategorido;
use App\Bobotbaru;

class TambahkategoriController extends Controller
{
    public function index($id_kategori)
    {
        $kategori      = Kategori::all();
        return view('admin.tambahkategori', compact('kategori'));
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
