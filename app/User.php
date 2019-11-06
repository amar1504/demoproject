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
     * The database table used by the model.
     *
     * @var string
     */
    protected $table="users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'email', 'password','roles','status','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Get role record assocated with user 
     */
    
    //User and role relationship -start
    public function userRole() {
        return $this->hasOne('App\Role', 'id', 'roles' );
    }
    //User and role relationship -End
}
