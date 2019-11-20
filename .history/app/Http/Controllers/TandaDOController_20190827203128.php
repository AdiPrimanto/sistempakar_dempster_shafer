<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tandado;

class TandaDOController extends Controller
{
    public function index()
    {
        $tandado = Tandado::all();
        return view('admin.tandado', compact('tandado'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_tanda' => 'required',
            'nama_tanda' => 'required',
            'tanda'
        ]);
        
        $model = new Tandado();
        $model->kode_tanda = $request->kode_tanda;
        $model->nama_tanda = $request->nama_tanda;
        $model->save();
        return redirect('tandado')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id_kelas)
    {
        $tnd = \App\Tandado::find($id_tanda);
        return view('tandado/edit', ['tandado' => $tnd]);
    }

    public function update(Request $request, $id_tanda)
    {
        $tnd = \App\Tandado::find($id_tanda);
        $tnd->update($request->all());
        return redirect('/tandado')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id_tanda)
    {
        $tnd = \App\Tandado::find($id_tanda);
        $tnd->delete($tnd);
        return redirect(route('tandado'))->with('success', 'Data Berhasil Dihapus');
    }
}
