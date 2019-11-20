<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bobot;

class HasilController extends Controller
{
    public function index()
    {
        $bobot = Bobot::all()
        return view('admin.hasil', compact('hasil'));
    }
}
