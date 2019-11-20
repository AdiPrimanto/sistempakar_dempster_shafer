<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorido;

class KaidahController extends Controller
{
    public function index()
    {
        // $kaidah = Kaidah::all();
        return view('admin.kaidah', compact('kaidah'));
    }
}
