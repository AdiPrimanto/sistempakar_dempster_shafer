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

        $abc = new Submit();
        $abc->id_mahasiswa = $request->input('id_mahasiswa');
        $abc->nama_mahasiswa = $request->input('nama_mahasiswa');
        $abc->nim = $request->input('nim');
        $abc->jurusan = $request->input('jurusan');
        $abc->jenjang = $request->input('jenjang');
        $abc->perguruan_tinggi = $request->input('perguruan_tinggi');
        $abc->tempat_lahir = $request->input('tempat_lahir');
        // $abc->tanggal_lahir = $request->input('tanggal_lahir');
        $abc->ipk = $request->input('ipk');
        $abc->asal_sekolah = $request->input('asal_sekolah');

        // $from->id_mahasiswa = $request->id_mahasiswa;
        // $from->nama_mahasiswa = $request->nama_mahasiswa;
        // $from->nim = $request->nim;
        // $from->jurusan = $request->jurusan;
        // $from->jenjang = $request->jenjang;
        // $from->perguruan_tinggi = $request->perguruan_tinggi;
        // $from->tempat_lahir = $request->tempat_lahir;
        // $from->tanggal_lahir = $request->input('tanggal_lahir');
        // $from->ipk = $request->ipk;
        // $from->asal_sekolah = $request->asal_sekolah;
        $abc->save();
        return redirect('/')->with('success', 'Data Berhasil Ditambahkan');
    }
    
}
