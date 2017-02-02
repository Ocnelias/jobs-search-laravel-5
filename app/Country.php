<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $fillable = ['name'];
 
    /**
     * Has Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function states()
    {
        return $this->hasMany('App\State');
    }
 
    /**
     * Has Many Through relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasManyThrough
     */
    public function cities()
    {
        return $this->hasManyThrough('App\City', 'App\State');
    }

}
