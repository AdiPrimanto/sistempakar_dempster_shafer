<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App/Mahasiswa

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('admin.mahasiswa');
    }
}
