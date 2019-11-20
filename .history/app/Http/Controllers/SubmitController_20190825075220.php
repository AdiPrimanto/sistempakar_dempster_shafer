<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submit;

class SubmitController extends Controller
{
    public function submit(Request $request){
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
        return redirect('/')->with('success', 'Data Berhasil Ditambahkan');
        print_r($submit);

        // return $request;

        
        
        
    }
    
}
