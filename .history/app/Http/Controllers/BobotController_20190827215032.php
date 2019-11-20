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
            // -> join('bobot','hasil_kuisioner.id_akademik', '=', 'akademik.id_akademik')
            // -> join('matakuliah','akademik.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            // -> join('kelas','akademik.id_kelas', '=', 'kelas.id_kelas')
            // ->where('nama_matakuliah', 'SISTEM FUZZY')
            -> get();
        return view('admin.bobot', compact('bobot'));
    }
}
