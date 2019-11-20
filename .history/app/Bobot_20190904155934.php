<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    protected $table = 'bobot';
    protected $primaryKey = 'id_bobot';
    protected $fillable = ['id_tanda', 'id_kategori'];
    public $timestamps = false;
    public function bobot()
    {
        $q = \DB::table('bobot')
                -> join('kategori', 'bobot.id_kategori', 'kategori.id_kategori')
                -> join('tanda', 'bobot.id_tanda', 'tanda.id_tanda')
                -> select('bobot.*', 'matakuliah.nama_matakuliah', 'dosen.nama_dosen', 'kelas.nama_kelas', 
                'semester.semester')
                -> get();

        return $q;
        
    }
}
