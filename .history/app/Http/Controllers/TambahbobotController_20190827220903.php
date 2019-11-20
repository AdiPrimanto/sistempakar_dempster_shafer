<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorido;
use App\Tandado;

class TambahbobotController extends Controller
{
    public function index()
    {
        $tambahbobot = DB::table('bobot')
                        -> insert('insert into rekapitulasi (nama_matakuliah, nama_dosen, nama_kelas, semester,
                        parameter1, parameter2, parameter3, max, z, hasil) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
                        [$value['matakuliah'], $value['dosen'], $value['kelas'], $value['semester'], $value['hasil1'],
                        $value['hasil2'], $value['hasil3'], $value['max'][0][0], $value['max'][1],
                        $value['max'][2]]);;
        
                        // $kategorido = DB::table('kategori')
        //               -> where('id_kategori', '=', '')
        //               -> get();

        return view('admin.tambahbobot', compact('tambahbobot'));
    }
}
