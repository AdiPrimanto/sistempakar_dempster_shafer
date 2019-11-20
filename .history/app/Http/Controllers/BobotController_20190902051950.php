<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bobot;

class BobotController extends Controller
{
    public function index()
    {
        $bobot = \DB::table('bobot')
            -> join('kategori','bobot.id_kategori', '=', 'kategori.id_kategori')
            -> join('tanda','bobot.id_tanda', '=', 'tanda.id_tanda')
            -> select('bobot.*','kategori.nama_kategori','tanda.bobot')
            -> get();

        return view('admin.bobot', compact('bobot'));
    }

    public function show(Kaidah $id_kategori)
    {
        return view('bobot')
    }
}
