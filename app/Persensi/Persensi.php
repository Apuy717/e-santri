<?php

namespace App\Persensi;

use Illuminate\Database\Eloquent\Model;

class Persensi extends Model
{
    protected $table ='persensi';
    protected $fillable = ['user_NIM', 'tgl', 'waktu', 'H', 'I', 'S', 'keterangan', 'waktu_id'];
}
