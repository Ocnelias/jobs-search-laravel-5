<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Job extends Model
{
    
 

     
     
     
   public function firm()
  {
    return $this->belongsTo('App\Firm');
  }
  
}
