<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tandado extends Model
{
    protected $table = 'tanda';
    protected $primaryKey = 'id_tanda';
    protected $fillable = ['kode_tanda', 'nama_tanda', 'bobot'];
    public $timestamps = false;
}
