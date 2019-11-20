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
            // -> join('kategori','bobot.id_kategori', '=', 'kategori.id_kategori')
            -> join('tanda','bobot.id_tanda', '=', 'tanda.id_tanda')
            -> select('bobot.*','tanda.nama_tanda','tanda.bobot')
            -> where('id_kategori','=', $id_kategori)
            -> get();
        return view('admin.bobot', compact('bobot','idKategori'));
        // dd($idKategori);
    }

    public function delete($id_tanda)
    {
        $bbt = \App\Bobot::find($id_tanda);
        $bbt->delete($bbt);
        return redirect(route('bobot'))->with('success', 'Data Berhasil Dihapus');
    }
}
