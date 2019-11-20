<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kategorido;
use App\Tandado;
use App\Bobot;

class TambahbobotController extends Controller
{
    public function index()
    {
        $bobot = \DB::table('kategori')
            -> join('bobot','kategori.id_kategori', '=', 'bobot.id_kategori')
            -> join('tanda','kategori.id_tanda', '=', 'tanda.id_tanda')
            -> select('kategori.*','kategori.nama_kategori','tanda.nama_tanda')
            -> get();
        return view('admin.tambahbobot', compact('tambahbobot'));
    }

    public function insert(Request $request)
    {
        $submit = new Bobot();
        $submit->id_tanda = $request->id_tanda;
        $submit->save();
        
        return redirect('/kaidah');
    }
}
