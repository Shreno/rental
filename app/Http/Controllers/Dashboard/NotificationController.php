<?php

namespace App\Http\Controllers\Dashboard;

use App\Jobs\Notify;
use App\Models\User;
use App\Jobs\SendSms;
use App\Models\Admin;
use App\Jobs\AdminNotify;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\NotifyUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Mail\SendMail;
use App\Models\Device;
use App\Models\Notification as ModelsNotification;

class NotificationController extends Controller
{
    public function index()
    {
       $notifications = ModelsNotification::where(function ($q) {
        $q->where('notifiable_id', Auth()->user()->id);
        })->unread()->orderBy('id','desc')
         ->paginate(15);
    
       return view('dashboard.notifications.index' , compact('notifications'));
    }

    public function destroy($id)
    {
        $notification = ModelsNotification::findOrFail($id);
        $notification->delete();
        return response()->json();
    }

    public function sendNotification(Request $request)
    {
        if ($request->user_type == 'all_users' ) {
            $rows = User::get() ; 
        }
        dispatch(new Notify($rows, $request));
        
        
        return response()->json() ; 
    }



    public function notify(Request $request) {
        if ($request->notify == 'notifications') {
            if ('all' == $request->id) {
              $clients = User::latest()->get();
              Notification::send( $clients , new NotifyUser($request->all()));
            } else {
              $client = User::findOrFail($request->id);
              Notification::send($client , new NotifyUser($request->all()));
            }
        }else{
            if ('all' == $request->id) {
              $mails = User::where('email' , '!=' , null)->get()->pluck('email')->toArray();
              Mail::to($mails)->send(new SendMail(['title' => 'اشعار اداري' , 'message' =>  $request->message]));
            } else {
              $mail = User::findOrFail($request->id)->email;
              Mail::to($mail)->send(new SendMail(['title' => 'اشعار اداري' , 'message' =>  $request->message]));
            }
        }
        return response()->json();
    }


    public function storeToken(Request $request)
    {
       
       return  Device::firstOrCreate([
                'morph_id' => auth()->user()->id,
                'morph_type' => 'App\Models\User',  
                'device_id' =>  $request->token,
                'device_type'  => 'web'
            ]);
        
    }

    public function create()
    {
        return view('dashboard.notifications.create');
    }

   
}
