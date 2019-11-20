<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tandado;
use App\Kategorido;

class BobotController extends Controller
{
    public function index()
    {
        $bobot = \DB::table('kategori')
            -> join('bobot','kategori.id_kategori', '=', 'bobot.id_kategori')
            -> join('tanda','kategori.id_tanda', '=', 'tanda.id_tanda')
            -> select(kategori*')
            -> get();
        return view('admin.bobot', compact('bobot'));
    }
}
