<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    protected $table = 'bobot';
    protected $primaryKey = 'id_bobot';
    protected $fillable = ['id_tanda', 'id_dosen', 'id_kelas', 'id_semester'];
    public $timestamps = false;
}
