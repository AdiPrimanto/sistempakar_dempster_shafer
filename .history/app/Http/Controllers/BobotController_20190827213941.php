<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tandado;

class BobotController extends Controller
{
    public function index()
    {

        return view('admin.bobot', compact('bobot'));
    }
}
