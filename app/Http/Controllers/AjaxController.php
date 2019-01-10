<?php

namespace App\Http\Controllers;
use App\Notification;
use Auth;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function checkNotification(){

        if (true) {
          $this->getNotifications();
        }
    }

    public function getNotifications(){
        $notifications = Notification::where('user_id', Auth::user()->id)->get();
        return $notifications;
    }
}
