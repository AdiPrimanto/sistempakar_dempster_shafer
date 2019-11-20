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
        $tanda   = DB::table('tanda')->where('id_tanda', '=', $id_tanda)->get();      
        $kategori      = Kategorido::all();
        return view('admin.tambahkategori', compact('kategori'));
    }

    public function insert(Request $request)
    {
        $submit = new Bobotbaru();
        $submit->id_tanda = $request->id_tanda;
        $submit->id_kategori = $request->id_kategori;
        $submit->save();
        return redirect('/bobotbaru');
    }
}
