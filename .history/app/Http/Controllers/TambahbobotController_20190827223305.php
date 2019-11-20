<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorido;
use App\Tandado;

class TambahbobotController extends Controller
{
    public function index()
    {
        $tambahbobot = DB::table('bobot')->insert([
                        ['email' => 'taylor@example.com', 'votes' => 0],
                ['email' => 'dayle@example.com', 'votes' => 0]
        ]);
        
                        // $kategorido = DB::table('kategori')
        //               -> where('id_kategori', '=', '')
        //               -> get();

        return view('admin.tambahbobot', compact('tambahbobot'));
    }
}
