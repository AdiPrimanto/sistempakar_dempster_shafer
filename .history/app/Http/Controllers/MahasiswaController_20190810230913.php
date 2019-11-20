<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('admin.mahasiswa');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_tanda' => 'required',
            'nama_tanda' => 'required'
        ]);
        
        $model = new Tandado();
        $model->kode_tanda = $request->kode_tanda;
        $model->nama_tanda = $request->nama_tanda;
        $model->save();
        return redirect('tandado')->with('success', 'Data Berhasil Ditambahkan');
    }
}
