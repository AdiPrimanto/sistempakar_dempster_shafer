<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahnilaibobotController extends Controller
{
    public function index()
    {
        return view('admin.tambahnilaibobot', compact('tambahnilaibobot'));
    }
}
