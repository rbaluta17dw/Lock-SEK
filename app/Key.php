<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $table = 'whitelist';

    public function privileges()
    {
        return $this->hasMany('App\Privilege');
    }

}
