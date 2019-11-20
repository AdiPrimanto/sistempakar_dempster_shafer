<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorido;

class TambahbobotController extends Controller
{
    public function index()
    {
        return view('admin.tambahbobot', compact('tambahbobot'));
    }
}
