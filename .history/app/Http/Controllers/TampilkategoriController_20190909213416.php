<?php

namespace App\Http\Controllers;
use App\Bobotbaru;

use Illuminate\Http\Request;

class TampilkategoriController extends Controller
{
    public function index($id_tanda)
    {
        $idTanda = $id_tanda;

        $bobotbaru = \DB::table('bobotbaru')
            -> join('kategori','bobot.id_kategori', '=', 'kategori.id_kategori')
            // -> join('tanda','bobot.id_tanda', '=', 'tanda.id_tanda')
            // -> select('bobot.*','tanda.nama_tanda','tanda.bobot')
            -> select('bobot.*','kategori.nama_tanda')
            -> where('id_tanda','=', $id_tanda)
            -> get();
        return view('admin.bobotbaru', compact('bobotbaru','idTanda'));
        // dd($idKategori);
    }

    public function delete($id_tanda)
    {
        $bbt = \App\Bobotbaru::find($id_tanda);
        $bbt->delete($bbt);
        return redirect(route('bobot'))->with('success', 'Data Berhasil Dihapus');
    }
}
