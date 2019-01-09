<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\VerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{

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
        return $this->belongsToMany('App\User');
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
}
