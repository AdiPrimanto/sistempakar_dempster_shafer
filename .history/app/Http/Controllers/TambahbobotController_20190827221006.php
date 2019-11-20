<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorido;
use App\Tandado;

class TambahbobotController extends Controller
{
    public function index()
    {
        $tambahbobot = DB::table('bobot')
                        -> insert('insert into bobot (id_tanda, id_kategori) );
        
                        // $kategorido = DB::table('kategori')
        //               -> where('id_kategori', '=', '')
        //               -> get();

        return view('admin.tambahbobot', compact('tambahbobot'));
    }
}
