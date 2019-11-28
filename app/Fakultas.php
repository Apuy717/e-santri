<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table ='fakultas';
    protected $fillable =['fakultas'];
    public function prodi()
    {
    	return $this->hasMany('App\Prodi');
    }
}
