<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorido;
use App\Tandado;

class TambahbobotController extends Controller
{
    public function index()
    {
        $bobot = DB::table('kategori')
                        -> insert();
        
                        // $kategorido = DB::table('kategori')
        //               -> where('id_kategori', '=', '')
        //               -> get();

        return view('admin.tambahbobot', compact('tambahbobot'));
    }
}
