<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tandado;
use App\Kategorido;
use App\Bobotbaru;

class TambahkategoriController extends Controller
{
    public function index($id_tanda)
    {
        $tanda      = DB::table('tanda')->where('id_tanda', '=', $id_tanda)->get();      
        $tandaa     = Kategorido::all();
        $kategori   = DB::table('kategori')
                    ->select('id_kategori','nama_kategori')
                    ->whereNotIn('id_kategori', function($query) use ($id_tanda){

                        $query->select('id_kategori')->from('bobotbaru')->where('id_tanda', '=', $id_tanda);

                    })->get();
                    
        return view('admin.tambahkategori', compact('tanda','tandaa', 'kategori'));
    }

    public function insert(Request $request)
    {
        $submit = new Bobotbaru();
        $submit->id_tanda = $request->id_tanda;
        $submit->id_kategori = $request->id_kategori;
        $submit->save();
        return redirect("tampilkategori/{$request->id_tanda}/show");
    }
}
