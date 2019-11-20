<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategorido extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'kode_kategori';
    protected $fillable = ['nama_tanda'];
    public $timestamps = false;
}
