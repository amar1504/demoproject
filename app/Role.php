<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table="roles";

    protected $fillable = ['id','role_name','status','created_at','updated_at']; //fillable fields in role



    //role and user relationship -start
    public function roleUser() {
        return $this->belongsTo('App\User', 'roles' );
    }
    //role and user relationship -End

}
