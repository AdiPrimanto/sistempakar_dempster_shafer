<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tandado;
use App\Kategorido;
use App\Bobot;

class BobotController extends Controller
{
    public function index()
    {
        $bobot = \DB::table('bobot')
            -> join('kategori','bobot.id_kategori', '=', 'kategori.id_kategori')
            -> join('tanda','bobot.id_tanda', '=', 'tanda.id_tanda')
            -> select('bobot.*','kategori.nama_kategori','tanda.nama_tanda')
            -> get();
        return view('admin.bobot', compact('bobot'));
    }
}
