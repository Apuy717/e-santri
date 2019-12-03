<?php

namespace App\Role;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table ='role_users';
    protected $flillable = ['user_id', 'role_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
