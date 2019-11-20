<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TandatandaController extends Controller
{
    public function index()
    {
        return view('admin.tandatanda', compact('tandatanda'));
    }
}
