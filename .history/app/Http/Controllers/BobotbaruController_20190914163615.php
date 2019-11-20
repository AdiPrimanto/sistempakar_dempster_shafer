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

    public function delete($id_bobotbaru)
    {
        $tnd = \App\Bobotbaru::find($id_bobotbaru);
        $tnd->delete($tnd);
        return redirect(route('bobotbaru'))->with('success', 'Data Berhasil Dihapus');
    }
}
