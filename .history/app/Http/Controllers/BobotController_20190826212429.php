<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BobotController extends Controller
{
    public function index()
    {
        return view('admin.tanbobot', compact('bobot'));
    }
}
