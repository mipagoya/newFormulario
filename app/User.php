<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
    	//return $this->belongsToMany('App\User','ADMIN_role_user')->withTimestamps();
    	return $this->belongsToMany('App\Models\Admin\Role','tbl_GLOBAL_USER_ROL','id_user','id_rol');
    }

}
