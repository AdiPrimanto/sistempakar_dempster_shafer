<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submit;

class SubmitController extends Controller
{
    public function submit(Request $request){
        //     $this->validate($request, [
        //     'nama_mahasiswa' => 'required',
        //     'nim' => 'required',
        //     'jurusan' => 'required',
        //     'jenjang' => 'required',
        //     'perguruan_tinggi' => 'required',
        //     'tempat_lahir' => 'required',
        //     // 'tanggal_lahir' => 'required',
        //     'ipk' => 'required',
        //     'asal_sekolah' => 'required'
        // ]);
        // // print_r($request->input('nama_mahasiswa'));

        // $abc = new Submit();
        // $abc->id_mahasiswa = $request->input('id_mahasiswa');
        // $abc->nama_mahasiswa = $request->input('nama_mahasiswa');
        // $abc->nim = $request->input('nim');
        // $abc->jurusan = $request->input('jurusan');
        // $abc->jenjang = $request->input('jenjang');
        // $abc->perguruan_tinggi = $request->input('perguruan_tinggi');
        // $abc->tempat_lahir = $request->input('tempat_lahir');
        // // $abc->tanggal_lahir = $request->input('tanggal_lahir');
        // $abc->ipk = $request->input('ipk');
        // $abc->asal_sekolah = $request->input('asal_sekolah');
        // $abc->save();
        // return redirect('/')->with('success', 'Data Berhasil Ditambahkan');
        return $request;
    }
    
}
