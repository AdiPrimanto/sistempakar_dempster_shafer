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
        $bobot = \DB::table('kategori')
            -> join('bobot','kategori.id_kategori', '=', 'bobot.id_kategori')
            -> join('tanda','kategori.id_tanda', '=', 'tanda.id_tanda')
            -> select('kategori.*','bobot.nama_kategori','tanda.nama_tanda')
            -> get();
        return view('admin.bobot', compact('bobot'));
    }
}
