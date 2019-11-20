<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tandado;
use App\Kategorido;
use App\Bobot;

class TambahbobotController extends Controller
{
    public function index()
    {
        // $kategori   = DB::table('kategori')->select('nama_kategori');
        // $kategori   = Kategorido::all();
        // $kategori = \DB::table('bobot')
        //     -> join('kategori','bobot.id_kategori', '=', 'kategori.id_kategori')
        //     -> select('bobot.*','kategori.nama_kategori')
        //     -> get();
        // $kategori   = Kategorido::select('nama_kategori')->get();
        $kategori   = DB::table('kategori')->pluck('nama_kategori');
        
        $tanda      = Tandado::all();
        // dd($kategori);
        return view('admin.tambahbobot', compact('kategori','tanda'));
    }

    public function insert(Request $request)
    {
        $submit = new Bobot();
        $submit->id_tanda = $request->id_tanda;
        $submit->save();
        
        return redirect('/kaidah');
    }
}
