<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\VerifyEmail;
use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;




class User extends Authenticatable implements MustVerifyEmail
{
  use SoftDeletes;
  use SoftCascadeTrait;
  protected $dates = ['deleted_at'];
  protected $softCascade = ['locks','keys','notifications','privileges'];

  public function locks()
  {
    return $this->hasMany('App\Lock');
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
    return $this->belongsToMany('App\Lock', 'privileges')->withPivot('privilege');
  }
  use Notifiable;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name', 'email', 'password',
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];
  public function sendEmailVerificationNotification()
  {
    $this->notify(new VerifyEmail);
  }
  /**
  * Send the password reset notification.
  *
  * @param  string  $token
  * @return void
  */
  public function sendPasswordResetNotification($token)
  {
    $this->notify(new ResetPassword($token));
  }
}
