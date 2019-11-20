<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bobot;

class BobotController extends Controller
{
    public function index()
    {
        $bobot = \DB::table('bobot')->select;

        return view('admin.bobot', compact('bobot'));
    }
}
