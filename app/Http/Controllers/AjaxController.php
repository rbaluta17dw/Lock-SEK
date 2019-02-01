<?php

namespace App\Http\Controllers;
use App\Notification;
use Auth;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function getNotifications(){
        $notifications = Notification::where('user_id' => Auth::user()->id, 'notificable' => 1)->get();
        return $notifications;
    }
}
