<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorido;

class KaidahController extends Controller
{
    public function index()
    {
        // $kaidah = Kaidah::all();
        $kaidah = Kategorido::all();
        return view('admin.kaidah', compact('kaidah'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_kategori' => 'required',
            'nama_kategori' => 'required'
        ]);

        $model = new Kategorido();
        $model->kode_kategori = $request->kode_kategori;
        $model->nama_kategori = $request->nama_kategori;
        $model->save();
        return redirect(route('kaidah'))->with('success', 'Data Berhasil Ditambahkan');
    }

    // public function edit($id_kategori)
    // {
    //     $ktgr = \App\Kaidah::find($id_kategori);
    //     return view('kaidah/edit', ['kaidah' => $ktgr]);
    // }

    // public function update(Request $request, $id_kategori)
    // {
    //     $ktgr = \App\Kaidah::find($id_kategori);
    //     $ktgr->update($request->all());
    //     return redirect('/kaidah')->with('success', 'Data Berhasil Diupdate');
    // }

    public function delete($id_kategori)
    {
        $ktgr = \App\Kaidah::find($id_kategori);
        $ktgr->delete($ktgr);
        return redirect(route('kaidah'))->with('success', 'Data Berhasil Dihapus');
    }

    public function show(Kaidah $id_kategori)
    {

    }
    
}
