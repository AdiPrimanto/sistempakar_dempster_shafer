<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorido;
use App\Tandado;

class TambahbobotController extends Controller
{
    public function index()
    {
        // $kategorido = DB::table('kategori')
        //               -> where('id_kategori', '=', '')
        //               -> get();
        $tandado = Tandado::all();
        return view('admin.tambahbobot', compact('tambahbobot'));
    }
}
