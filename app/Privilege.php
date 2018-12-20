<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function lock()
    {
        return $this->belongsTo('App\Lock');
    }
    public function keys()
    {
        return $this->hasMany('App\Key');
    }
}
