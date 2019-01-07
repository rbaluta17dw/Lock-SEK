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
        }else {

        }
    }

    public function getNotifications(){
        $notifications = Notification::where('id_user', Auth::user()->id);
        return $notifications;
    }
}
