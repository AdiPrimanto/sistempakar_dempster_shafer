<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tandado;
use App\Kategorido;

class BobotController extends Controller
{
    public function index()
    {
        $bobot = DB::table('kategori')
            // -> join('bobot','kategori.id_kategori', '=', 'bobot.id_kategori')
            // -> join('tanda','tanda.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            // ->where('nama_matakuliah', 'SISTEM FUZZY')
            -> get();
        return view('admin.bobot', compact('bobot'));
    }
}
