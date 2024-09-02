<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Notification;


use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notifications = Notification::where(function ($q) {
            $q->where('notifiable_id', Auth()->user()->id);
        })->unread()->orderBy('id','desc')
        ->paginate(15);

        foreach ($notifications as $notification) {
            $notification->markAsRead();
        }
        return view('client.notifications',compact('notifications'));
    }
   
}
