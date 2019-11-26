<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CMS extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cms';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'type' ,'description', 'status'];

    /**
     * Get the  title.
     *
     * @param  string  $value
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Set the  title.
     *
     * @param  string  $value
     * @return void
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }

    
}
