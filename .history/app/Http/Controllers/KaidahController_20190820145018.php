<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorido;

class KaidahController extends Controller
{
    public function index()
    {
        // $kaidah = Kaidah::all();
        $kategorido = Kategorido::all();
        return view('admin.kaidah', compact('kaidah'));
    }
}
