<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table="siswa";

    protected $fillable = [
        'nis', 'nama', 'j_kel','alamat','tgl_lahir'
    ];
}
