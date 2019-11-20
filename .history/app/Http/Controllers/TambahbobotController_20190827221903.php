<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorido;
use App\Tandado;

class TambahbobotController extends Controller
{
    public function index(Request $request)
    {
        $submit = new Submit();
        $submit->id_tanda      = $request->id_tanda;
        $submit->save();

        $tambahbobot = DB::table('bobot')->insert([
                        ['id_tanda' => 'nama_tanda']]);
        
        return view('admin.tambahbobot', compact('tambahbobot'));
    }
}


// $kategorido = DB::table('kategori')
        //               -> where('id_kategori', '=', '')
        //               -> get();