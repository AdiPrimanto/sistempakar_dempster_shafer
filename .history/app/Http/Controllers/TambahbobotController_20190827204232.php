<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorido;
use App\Tandado;

class TambahbobotController extends Controller
{
    public function index()
    {
        // $kategorido = Kategorido::all();
        $akademik = DB::table('akademik')
                    -> select(['akademik.id_matakuliah', 'nama_matakuliah'])
                    -> join('matakuliah','akademik.id_matakuliah', '=', 'matakuliah.id_matakuliah')
                    -> groupBy('akademik.id_matakuliah')
                    ->get();
        $tandado = Tandado::all();
        return view('admin.tambahbobot', compact('tambahbobot'));
    }
}
