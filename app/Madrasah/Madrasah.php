<?php

namespace App\Madrasah;

use Illuminate\Database\Eloquent\Model;

class Madrasah extends Model
{
	protected $table ='madrasah';
    public function santri()
    {
    	return $this->hasMany('App\Santri');
    }
}
