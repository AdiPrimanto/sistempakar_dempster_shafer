<?php

namespace App\Http\Controllers;
// use Response;
use Illuminate\Http\Request;
use App\Bobotbaru;
use App\Tandado;

class HasilController extends Controller
{
    public function index()
    {
        $bobot = \DB::table('bobotbaru')
            -> join('tanda','bobotbaru.id_tanda', '=', 'tanda.id_tanda')
            -> join('kategori','bobotbaru.id_kategori', '=', 'kategori.id_kategori')
            -> select('tanda.nama_tanda','tanda.bobot','tanda.id_tanda')
            -> distinct()
            
            -> get();
        
        // $tandado = Tandado::all();
        
        return view('admin.hasil', compact('bobot'));
    }

    public function hitung(Request $request)
    {
        $bobot = \DB::table('bobotbaru')
            -> join('tanda','bobotbaru.id_tanda', '=', 'tanda.id_tanda')
            -> join('kategori','bobotbaru.id_kategori', '=', 'kategori.id_kategori')
            -> select('tanda.nama_tanda','tanda.bobot','tanda.id_tanda')
            -> distinct()
            -> get();

        $all_data = array();
        
        foreach($request -> data as $data){

            $result = \DB::table('tanda')
            -> select('bobot','nama_tanda', 'kode_tanda')
            -> where('id_tanda',$data)
            -> get();

            foreach($result as $tan){

                $kode_tanda =  $tan -> kode_tanda;
                $nama_tanda =  $tan -> nama_tanda;
                $bobot      =  $tan -> bobot;
                
            }
        
            $res_kategori = \DB::table('bobotbaru')
            ->join('kategori', 'kategori.id_kategori','=','bobotbaru.id_kategori')
            ->select('kategori.id_kategori','kategori.nama_kategori','kategori.kode_kategori')
            ->where('bobotbaru.id_tanda', $data)
            ->get();

            
            $kategori = array();
            foreach($res_kategori as $newdata){

                $dict_data = array(
                    "kode_kategori" => $newdata -> kode_kategori,
                    "nama_kategori" => $newdata -> nama_kategori
                );

                array_push($kategori, $dict_data);
            }            

            $tanda = [
                "id_tanda"      => $data,
                "kode_tanda"    => $kode_tanda,
                "nama_tanda"    => $nama_tanda,
                "bobot_tanda"   => $bobot,
                "kategori"      => $kategori,
            ];
            
            array_push($all_data,$tanda);

        }

        $data = array(
            "data" => $all_data
        ); 
        $data = json_encode($data);

        // error_log(print_r($data, true));

        return response()->json($data);
    }
}
