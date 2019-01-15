<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;


class Lock extends Model
{

  use SoftDeletes;
  use SoftCascadeTrait;
  protected $dates = ['deleted_at'];
  protected $softCascade = ['keys','notifications','privileges'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function keys()
    {
        return $this->hasMany('App\Key');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    public function privileges()
    {
        return $this->belongsToMany('App\User', 'privileges')->withPivot('privilege');;

    }
}
