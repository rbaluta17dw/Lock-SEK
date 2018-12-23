<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lock extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function keys()
    {
        return $this->hasMany('App\Key');
    }

    public function privileges()
    {
        return $this->belongsToMany('App\User', 'privileges');

    }
}
