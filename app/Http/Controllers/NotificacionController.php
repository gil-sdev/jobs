<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* This is a special method that is called when the controller is invoked as a function. */
    public function __invoke(Request $request)
    {
       /* Getting the unread notifications for the authenticated user. */
        $notificaciones = auth()->user()->unreadNotifications;

        /* Marking all the unread notifications as read. */
        auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index',[
            'notificaciones' => $notificaciones,
        ]);
    }
}
