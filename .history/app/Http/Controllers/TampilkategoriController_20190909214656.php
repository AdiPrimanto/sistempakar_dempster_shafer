<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bobotbaru;

class TampilkategoriController extends Controller
{
    public function index($id_tanda)
    {
        $idTanda = $id_tanda;

        $bobotbaru = \DB::table('bobotbaru')
            -> join('kategori','bobot.id_kategori', '=', 'kategori.id_kategori')
            // -> join('tanda','bobot.id_tanda', '=', 'tanda.id_tanda')
            // -> select('bobot.*','tanda.nama_tanda','tanda.bobot')
            -> select('bobot.*','kategori.nama_kategori')
            -> where('id_tanda','=', $id_tanda)
            -> get();
        return view('admin.tampilkategori', compact('tampilkategori','idTanda'));
        // dd($idKategori);
    }

    public function delete($id_tanda)
    {
        $tnd = \App\Bobotbaru::find($id_tanda);
        $tnd->delete($bbt);
        return redirect(route('bobotbaru'))->with('success', 'Data Berhasil Dihapus');
    }
}
