<?php

namespace App\Http\Controllers;
use App\Notification;
use Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
  public function getNotifications(){
    $notifications = Notification::where(['user_id' => Auth::user()->id, 'notificable' => 1])->get();
    return $notifications;
  }

  public function index(){
    $notifications = Notification::where(['user_id' => Auth::user()->id, 'notificable' => 1])->get();
    return view('pages/notification/notifications', ['notifications'=> $notifications]);
  }

  public function getLocksAccess(){
    $now=date('o');

    $notifications = Notification::where(['user_id' => Auth::user()->id,['created_at', 'like', $now.'%']])->get();

    return $notifications;
  }
}
