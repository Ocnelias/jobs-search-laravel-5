<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
     
    public $fillable = ['name', 'country_id'];
 
    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
 
    /**
     * Has Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function authors()
    {
        return $this->hasMany('App\City');
    }

}
