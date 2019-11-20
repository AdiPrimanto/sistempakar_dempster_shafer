<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tandado;
use App\Kategorido;

class BobotController extends Controller
{
    public function index()
    {
        $hasil = DB::table('hasil_kuisioner')
            // -> join('akademik','hasil_kuisioner.id_akademik', '=', 'akademik.id_akademik')
            // -> join('matakuliah','akademik.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            // -> join('kelas','akademik.id_kelas', '=', 'kelas.id_kelas')
            // ->where('nama_matakuliah', 'SISTEM FUZZY')
            // ->where('nama_kelas', '9')
            ->where('id_akademik', $ak->id_akademik)
            ->get();
        return view('admin.bobot', compact('bobot'));
    }
}
