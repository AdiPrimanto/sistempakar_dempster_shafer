<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bobotbaru extends Model
{
    protected $table = 'bobotbaru';
    protected $primaryKey = 'id_bobotbaru';
    protected $fillable = ['id_tanda', 'id_tanda'];
    public $timestamps = false;
}
