<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorido;
use App\Tandado;
use App\Bobot;

class TambahbobotController extends Controller
{
    public function index(Request $request)
    {
        $submit = new Bobot();
        $submit->id_tanda = $request->id_tanda;
        $submit->save();

        $tambahbobot = DB::table('bobot')->insert([
                        ['id_tanda' => 'nama_tanda']]);
        
        return redirect('/kaidah');
    }
}


// $kategorido = DB::table('kategori')
        //               -> where('id_kategori', '=', '')
        //               -> get();