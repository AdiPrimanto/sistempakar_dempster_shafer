<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kategorido;
use App\Tandado;

class TambahbobotController extends Controller
{
    public function index()
    {
       $bobot = \DB::table('kategori')
            -> join('bobot','kategori.id_kategori', '=', 'bobot.id_kategori')
            -> join('tanda','kategori.id_tanda', '=', 'tanda.id_tanda')
            -> select('kategori.*','bobot.nama_kategori','tanda.nama_tanda')
            -> get();
        return view('admin.tambahbobot', compact('bobot'));

        $tandado = Tandado::all();
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
