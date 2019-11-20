<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bobot;
use App\Kategorido;

class HasilController extends Controller
{
    public function index()
    {
        $bobot = \DB::table('bobot')
            -> join('kategori','bobot.id_kategori', '=', 'kategori.id_kategori')
            -> join('tanda','bobot.id_tanda', '=', 'tanda.id_tanda')
            -> select('bobot.*','kategori.nama_kategori','tanda.bobot')
            -> get();

        // dd($bobot);
        // return view('admin.hasil', compact('bobot'));
    }
}
