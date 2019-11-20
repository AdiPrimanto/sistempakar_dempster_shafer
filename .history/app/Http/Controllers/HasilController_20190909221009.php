<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bobot;
use App\Kategorido;

class HasilController extends Controller
{
    public function index()
    {
        $bobot = \DB::table('bobotbaru')
            -> join('kategori','bobot.id_kategori', '=', 'kategori.id_kategori')
            
            -> select('bobot.*','kategori.nama_kategori','tanda.bobot')
            -> get();

        // dd($bobot);
        return view('admin.hasil', compact('bobot'));
    }
}
