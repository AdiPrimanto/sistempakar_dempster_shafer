<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategorido extends Model
{
    protected $table = 'tanda';
    protected $primaryKey = 'kode_tanda';
    protected $fillable = ['nama_tanda'];
    public $timestamps = false;
}
