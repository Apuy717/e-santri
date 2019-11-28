<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table ='prodi';
    protected $fillable =['prodi', 'fakultas_id'];
    public function fakultas()
    {
    	return $this->belongsTo('App\Fakultas');
    }

    public function santri()
    {
        return $this->hasMany('App\Prodi');
    }
}
