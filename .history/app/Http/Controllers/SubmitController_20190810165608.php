<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmitController extends Controller
{
    public function submit(Request $request){
            $this->validate($request, [
            'nama_mahasiswa' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
            'jenjang' => 'required',
            'perguruan_tinggi' => 'required',
            'tempat_lahir' => 'required',
            // 'tanggal_lahir' => 'required',
            'ipk' => 'required',
            'asal_sekolah' => 'required'
        ]);

        $from = new Submit();
        $from->id_mahasiswa = $request->input('id_mahasiswa');
        $from->nama_mahasiswa = $request->input('nama_mahasiswa');
        $from->nim = $request->input('nim');
        $from->jurusan = $request->input('jurusan');
        $from->jenjang = $request->input('jenjang');
        $from->perguruan_tinggi = $request->input('perguruan_tinggi');
        $from->tempat_lahir = $request->input('tempat_lahir');
        // $from->tanggal_lahir = $request->input('tanggal_lahir');
        $from->ipk = $request->input('ipk');
        $from->asal_sekolah = $request->input('asal_sekolah');

        $from->id_mahasiswa = $request->id_mahasiswa;
        $from->save();
        return redirect('/')->with('success', 'Data Berhasil Ditambahkan');
    }
    
}
