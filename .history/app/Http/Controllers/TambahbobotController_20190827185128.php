<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorido;
use App\Tandado;

class TambahbobotController extends Controller
{
    public function index()
    {
        $tandado = Tandado::all();
        return view('admin.tambahbobot', compact('tambahbobot'));
    }
}
