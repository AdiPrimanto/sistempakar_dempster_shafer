<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submit;

class SubmitController extends Controller
{
    public function index()
    {
        $mahasiswa = Submit::all();
        return view('admin.mahasiswa', compact('mahasiswa'));
    }

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
    }

    public function delete($mahasiswa)
    {
        $mhs = \App\Kelas::find($id_kelas);
        $mhs->delete($kls);
        return redirect(route('kelas'))->with('success', 'Data Berhasil Dihapus');
    }
    
}
