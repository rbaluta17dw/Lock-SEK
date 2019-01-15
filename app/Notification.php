<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Notification extends Model
{
  use SoftDeletes; 
  public function users()
  {
      return $this->belongsTo('App\User');
  }

  public function key()
  {
      return $this->belongsTo('App\Key');
  }

  public function lock()
  {
      return $this->belongsTo('App\Lock');
  }
}
