<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bobot;

class BobotController extends Controller
{
    public function index($id_kategori)
    {
        $idKategori = $id_kategori;

        $bobot = \DB::table('bobot')
            // -> join('kategori','bobot.id_kategori', '=', 'kategori.id_kategori')
            -> join('tanda','bobot.id_tanda', '=', 'tanda.id_tanda')
            -> select('bobot.*','tanda.nama_tanda','tanda.bobot')
            -> where('bobot.*','=', $id_kategori)
            -> get();
        return view('admin.bobot', compact('bobot','idKategori'));
        // dd($idKategori);
    }
}
