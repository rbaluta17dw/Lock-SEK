<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
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
