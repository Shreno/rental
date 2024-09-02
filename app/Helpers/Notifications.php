<?php


namespace App\Helpers;
use App\Models\User;


use Request;
use App\Models\Notification as Notification;


class Notifications
{




    public static function addNotification($id=null,$title, $message)
    {
		$notification = Notification::latest()->first();
    	$log = [];
		if($notification==null)
		{
			$log['id'] =1;

		}else{
			$log['id'] = $notification->id+1;

		}
		if($id==null){
			$id=1;
		}

    	$log['notifiable_id'] = $id;
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
