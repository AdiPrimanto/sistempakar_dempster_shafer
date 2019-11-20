<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bobotbaru;
use App\Tandado;

class HasilController extends Controller
{
    public function index()
    {
        // $bobot = \DB::table('bobotbaru')
        //     -> join('tanda','bobotbaru.id_tanda', '=', 'tanda.id_tanda')
        //     -> join('kategori','bobotbaru.id_kategori', '=', 'kategori.id_kategori')
        //     -> select('bobotbaru.*','tanda.nama_tanda','tanda.bobot')
        //     -> get();
        $tandado = Tandado::all();

        // dd($bobot);
        return view('admin.hasil', compact('tandado'));
    }
}
