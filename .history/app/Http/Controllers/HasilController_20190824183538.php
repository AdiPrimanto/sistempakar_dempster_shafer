<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index()
    {
        $tandado = Tandado::all();
        return view('admin.tandado', compact('tandado'));
    }
}
