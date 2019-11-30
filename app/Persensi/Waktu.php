<?php

namespace App\Persensi;

use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    protected $table = 'waktu';

    public function persensi()
    {
    	return $this->hasMasny('App\Persensi\Persensi');
    }
}
