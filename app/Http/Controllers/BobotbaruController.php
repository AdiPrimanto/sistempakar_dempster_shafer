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

    public function delete($id_tanda, $id_kategori)
    {
        
        $tnd = \App\Bobotbaru::where('id_tanda', $id_tanda)
            ->where('id_kategori', $id_kategori)
            ->delete();

        return redirect("/tampilkategori/{$id_tanda}/show");
    }
}
