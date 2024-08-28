<?php


namespace App\Helpers;
use App\Models\User;


use Request;
use App\Models\Notification as Notification;


class Notifications
{




    public static function addNotification($title, $message)
    {
		$notification = Notification::latest()->first();
    	$log = [];
		if($notification==null)
		{
			$log['id'] =1;

		}else{
			$log['id'] = $notification->id+1;

		}

    	$log['notifiable_id'] = 1;
    	$log['title'] = $title;
    	$log['data'] = $message;
    	$log['notifiable_type'] = 'web';
		$log['type'] = 'web';

    	Notification::create($log);
    }




    public static function notificationLists()
    {
    	return Notification::latest()->get();
    }


}
