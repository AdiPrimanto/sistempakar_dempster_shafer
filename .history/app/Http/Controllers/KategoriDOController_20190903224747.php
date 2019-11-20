<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorido;

class KategoriDOController extends Controller
{
    public function index()
    {
        $kategorido = Kategorido::all();
        return view('admin.kategorido', compact('kategorido'));
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
            'kode_kategori' => 'required',
            'nama_kategori' => 'required'
        ]);

        $model = new Kategorido();
        $model->kode_kategori = $request->kode_kategori;
        $model->nama_kategori = $request->nama_kategori;
        $model->save();
        return redirect(route('kategorido'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id_kategori)
    {
        $ktgr = \App\Kategorido::find($id_kategori);
        return view('kategorido/edit', ['kategorido' => $ktgr]);
    }

    public function update(Request $request, $id_kategori)
    {
        $ktgr = \App\Kategorido::find($id_kategori);
        $ktgr->update($request->all());
        return redirect('/kategorido')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id_kategori)
    {
        $ktgr = \App\Kategorido::find($id_kategori);
        $ktgr->delete($ktgr);
        return redirect(route('kategorido'))->with('success', 'Data Berhasil Dihapus');
    }

}
