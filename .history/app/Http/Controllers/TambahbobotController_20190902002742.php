<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bobot;

class TambahbobotController extends Controller
{
    public function index()
    {
        $tambahb = Bobot();
        return view('admin.tambahbobot', compact('tambahbobot'));
    }

    public function insert(Request $request)
    {
        $submit = new Bobot();
        $submit->id_tanda = $request->id_tanda;
        $submit->save();
        
        return redirect('/kaidah');
    }
}
