<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tandado;
use App\Kategorido;
use App\Bobot;

class TambahbobotController extends Controller
{
    public function index($id_kategori)
    {
        // $kategori   = DB::table('kategori')->select('nama_kategori');
        // $kategori   = Kategorido::select('nama_kategori')->get();
        $kategori   = DB::table('kategori')->where('id_kategori', '=', $id_kategori)->get();        
        
        $tanda      = Tandado::all();
        // foreach($tanda as $item){
        //     error_log($item);
        // }
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
