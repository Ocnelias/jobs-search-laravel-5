<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
     public $fillable = ['name', 'city'];
 
    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
       // return $this->belongsTo('App\State');
    }
 

}
