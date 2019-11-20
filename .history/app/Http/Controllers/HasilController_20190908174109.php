<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bobot;

class HasilController extends Controller
{
    public function index()
    {
        $bobot = \DB::table('bobot')
            // -> join('kategori','bobot.id_kategori', '=', 'kategori.id_kategori')
            -> join('tanda','bobot.id_tanda', '=', 'tanda.id_tanda')
            -> select('bobot.*','tanda.nama_tanda','tanda.bobot')
            -> where('id_kategori','=', $id_kategori)
            -> get();
        return view('admin.hasil', compact('bobot'));
    }
}
