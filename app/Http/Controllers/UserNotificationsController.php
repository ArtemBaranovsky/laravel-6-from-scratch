<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    public function show()
    {
//        $notifications = auth()->user()->notifications;

//        foreach ($notifications as $notification) {       // slow, causes N+1 issue
//            $notification->markAsRead();
//        }

/*        $notifications = auth()->user()->unreadNotifications;
        $notifications->markAsRead();*/

        return view('notifications.show', [
            'notifications' => tap(auth()->user()->unreadNotifications)->markAsRead()
//            'notifications' => $notifications
//            'notifications' => auth()->user()->unread
        ]);
    }
}
