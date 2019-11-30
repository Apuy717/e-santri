<?php

namespace App\Persensi;

use Illuminate\Database\Eloquent\Model;

class Persensi extends Model
{
    protected $table ='persensi';
    protected $fillable = ['user_NIM', 'tgl', 'waktu', 'H', 'keterangan', 'waktu_id'];

    public function User()
    {
    	return $this->belongsTo('App\User', 'user_NIM', 'NIM');
    }
    public function waktu()
    {
    	return $this->belongsTo('App\Persensi\Waktu');
    }
}
