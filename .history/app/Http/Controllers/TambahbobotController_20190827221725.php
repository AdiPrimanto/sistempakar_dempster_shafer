<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorido;
use App\Tandado;

class TambahbobotController extends Controller
{
    public function index(Request $request)
    {
        $submit = new Submit();
        $submit->id_mahasiswa      = $request->id_mahasiswa;
        $submit->nama_mahasiswa    = $request->nama_mahasiswa;
        $submit->nim               = $request->nim;
        $submit->jurusan           = $request->jurusan;
        $submit->jenjang           = $request->jenjang;
        $submit->perguruan_tinggi  = $request->perguruan_tinggi;
        $submit->tempat_lahir      = $request->tempat_lahir;
        $submit->ipk               = $request->ipk;
        $submit->asal_sekolah      = $request->asal_sekolah;
        $submit->save();
        $tambahbobot = DB::table('bobot')->insert([
                        ['id_tanda' => 'nama_tanda']]);
        
                        // $kategorido = DB::table('kategori')
        //               -> where('id_kategori', '=', '')
        //               -> get();

        return view('admin.tambahbobot', compact('tambahbobot'));
    }
}
