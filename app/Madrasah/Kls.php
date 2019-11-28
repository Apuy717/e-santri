<?php

namespace App\Madrasah;

use Illuminate\Database\Eloquent\Model;

class Kls extends Model
{
    public function santri()
    {
    	return $this->hasMany('App\santri');
    }
}
