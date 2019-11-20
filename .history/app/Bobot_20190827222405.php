<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    protected $table = 'akademik';
    protected $primaryKey = 'id_akademik';
    protected $fillable = ['id_matakuliah', 'id_dosen', 'id_kelas', 'id_semester'];
    public $timestamps = false;
}
