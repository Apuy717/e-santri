<?php
//
namespace App;

use Illuminate\Database\Eloquent\Model;

class Asrama extends Model
{
    protected $table ='asrama';
    protected $fillable =['asrama'];
    public function kamar()
    {
    	return $this->hasMany('App\Kamar');
    }
}
