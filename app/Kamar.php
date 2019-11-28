<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
	protected $table ='kamar';
	protected $fillable =['kamar', 'asrama_id'];

	public function asrama()
    {
    	return $this->belongsTo('App\Asrama');
    }
    public function santri()
    {
    	return $this->hasMany('App\Santri');
    }
}
