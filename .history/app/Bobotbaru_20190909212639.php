<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bobotbaru extends Model
{
    protected $table = 'bobot';
    protected $primaryKey = 'id_bobot';
    protected $fillable = ['id_kategori', 'id_tanda'];
    public $timestamps = false;
}
