<?php

namespace App\Http\Controllers\CommercantAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\NexmoMessage;
use Carbon;
use App\Admin;
use Illuminate\Notifications\HasDatabaseNotification;
use Auth;
use App\Commercant;
class NotificationController extends Controller
{
	public function notification(Commercant $comm)
    {
        $comm = Auth::guard('commercant')->user();
        $notifications = $comm->unreadnotifications()->count();
        $notificationsCommercant = $comm->unreadnotifications()->where('type','App\Notifications\Stock')->count();
        return view('commercant.notification', compact('comm', 'notifications','notificationsCommercant'));
    }
     public function markAsRead($id) {

        $commercant = Auth::guard('commercant')->user();
        //dd($commercant);
        $notification = $commercant->notifications()->where('id',$id)->first();
        if ($notification)
        {
            $notification->markAsRead();
            return back();
        }
        else
            return back()->withErrors('we could not found the specified notification');
    }
public function delete($id) {
        $comm = Auth::guard('commercant')->user();
        $notification = $comm->notifications()->where('id',$id)->first();
        if ($notification)
        {
            $notification->delete();
            return back();
        }
        else
            return back()->withErrors('we could not found the specified notification');
    }
}
