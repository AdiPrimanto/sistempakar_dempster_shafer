<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    protected $fillable = ['nama_mahasiswa','nim','jurusan','jenjang','perguruan_tinggi','tempat_lahir',
		// 'tanggal_lahir',
		'ipk',
        'asal_sekolah'
    ];
    public $timestamps = false;

}
