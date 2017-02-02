<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firm extends Model {
    protected $fillable = [
    'title',
    'city',
    'category',
    'website',
    'email',
    'phone',
    'show_website',
    'show_email',
    'show_phone',
    'description',
    'logo',
    ];
    
    
       public function user()
  {
    return $this->belongsTo('App\User');
  }
  
     public function job()
  {
    return $this->hasMany('App\Job');
  }
  
}
