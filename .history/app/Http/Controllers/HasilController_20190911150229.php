<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bobotbaru;
use App\Tandado;

class HasilController extends Controller
{
    public function index()
    {
        $bobot = \DB::table('bobotbaru')
            -> join('tanda','bobotbaru.id_tanda', '=', 'tanda.id_tanda')
            -> join('kategori','bobotbaru.id_kategori', '=', 'kategori.id_kategori')
            -> select('bobotbaru.*','tanda.nama_tanda','tanda.bobot')
            -> get();
            $hasil = DB::table('hasil_kuisioner')
            // -> join('akademik','hasil_kuisioner.id_akademik', '=', 'akademik.id_akademik')
            // -> join('matakuliah','akademik.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            // -> join('kelas','akademik.id_kelas', '=', 'kelas.id_kelas')
            // ->where('nama_matakuliah', 'SISTEM FUZZY')
            // ->where('nama_kelas', '9')
            ->where('id_akademik', $ak->id_akademik)
            ->get();
        // $tandado = Tandado::all();

        
        return view('admin.hasil', compact('bobot'));
    }
}
