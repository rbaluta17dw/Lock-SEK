<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    public function users()
    {
      return $this->belongsToMany('App\User');
    }

    public function locks()
    {
      return $this->belongsToMany('App\Lock');
    }

    public function key()
    {
        return $this->belongsTo('App\Key);
    }
}
