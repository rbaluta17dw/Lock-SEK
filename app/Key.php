<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;


class Key extends Model
{

  use SoftDeletes;
  use SoftCascadeTrait;
  protected $dates = ['deleted_at'];
  protected $softCascade = ['notifications'];

    protected $table = 'whitelist';

    public function lock()
    {
        return $this->belongsTo('App\Lock');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }
}
