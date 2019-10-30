<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use Kodeine\Acl\Traits\HasRole;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="users";

    //fillable fields in users -start
    protected $fillable = [
        'firstname','lastname', 'email', 'password','roles','status','image'
    ];
    //fillable fields in users -end

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //User and role relationship -start
    public function userRole() {
        return $this->hasOne('App\Role', 'id', 'roles' );
    }
    //User and role relationship -End
}
