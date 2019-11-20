<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    protected $table = 'bobot';
    protected $primaryKey = 'id_bobot';
    protected $fillable = ['id_tanda', 'id_kategori'];
    public $timestamps = false;
    public function akademik()
    {
        $q = \DB::table('akademik')
                -> join('matakuliah', 'akademik.id_matakuliah', 'matakuliah.id_matakuliah')
                -> join('dosen', 'akademik.id_dosen', 'dosen.id_dosen')
                -> join('kelas', 'akademik.id_kelas', 'kelas.id_kelas')
                -> join('semester', 'akademik.id_semester', 'semester.id_semester')
                -> select('akademik.*', 'matakuliah.nama_matakuliah', 'dosen.nama_dosen', 'kelas.nama_kelas', 
                'semester.semester')
                -> get();

        return $q;
        
    }
}
