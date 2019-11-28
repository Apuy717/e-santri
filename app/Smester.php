<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smester extends Model
{
   	protected $table ='smester';
   	protected $fillable =['id', 'kode_smtr','smstr'];
   	
   	public function santri()
   	{
   		return $this->hasMany('App\Santri');
   	}
}
