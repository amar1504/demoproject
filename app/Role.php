<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table="roles";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','role_name','status','created_at','updated_at']; //fillable fields in role


    /**
     * Get user that role belongs to 
     */
    //role and user relationship -start
    public function roleUser() {
        return $this->belongsTo('App\User', 'roles' );
    }
    //role and user relationship -End

}
