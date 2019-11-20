<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tandado;
use App\Kategorido;

class BobotController extends Controller
{
    public function index()
    {
        $tandado = Tandado::all();
        return view('admin.bobot', compact('bobot'));
    }
}
