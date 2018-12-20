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
        return $this->hasMany('App\User');
    }

    public function privileges()
    {
<<<<<<< HEAD
        return $this->belongsToMany('App\User');
=======
        return $this->belongsToMany('App\User', 'privileges');

>>>>>>> b7e713670ad0e613527d18cf495aae23aa0382c4
    }
}
