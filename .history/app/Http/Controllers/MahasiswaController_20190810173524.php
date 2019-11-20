<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
U

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('admin.mahasiswa');
    }
}
