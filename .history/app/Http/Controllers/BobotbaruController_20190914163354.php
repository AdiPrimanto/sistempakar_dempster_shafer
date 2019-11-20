<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tandado;
use App\Bobotbaru;

class BobotbaruController extends Controller
{
    public function index()
    {
        $bobotbaru = Tandado::all();
        return view('admin.bobotbaru', compact('bobotbaru'));
    }

    public function delete($id_tanda)
    {
        $tnd = \App\Bobotbaru::find($id_tanda);
        $tnd->delete($);
        return redirect(route('bobotbaru'))->with('success', 'Data Berhasil Dihapus');
    }
}
