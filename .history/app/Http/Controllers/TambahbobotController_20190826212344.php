<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahbobotController extends Controller
{
    public function index()
    {
        return view('admin.tambahbobot', compact('bobot'));
    }
}
