<?php

namespace App\Http\Controllers\AdminAuth;

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
     /**
     * Display a listing notifications.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Admin $admin)
    {
        $admin = Auth::guard('admin')->user();
        $notifications = $admin->unreadnotifications()->count();

        $notificationsUser = $admin->unreadnotifications()->where('type','App\Notifications\Register')->count();
        $notificationsCommercant = $admin->unreadnotifications()->where('type','App\Notifications\RegisterCommercant')->count();
        return view('admin.home', compact('admin', 'notifications','notificationsCommercant', 'notificationsUser'));
    }

    public function notification(Admin $admin)
    {
        $admin = Auth::guard('admin')->user();
        $notifications = $admin->unreadnotifications()->count();
        $notificationsUser = $admin->unreadnotifications()->where('type','App\Notifications\Register')->count();
        $notificationsCommercant = $admin->unreadnotifications()->where('type','App\Notifications\RegisterCommercant')->count();
        return view('admin.notification', compact('admin', 'notifications','notificationsCommercant', 'notificationsUser'));
    }
    
    public function markAsRead($id) {
        $admin = Auth::guard('admin')->user();
        $notification = $admin->notifications()->where('id',$id)->first();
        if ($notification)
        {
            $notification->markAsRead();
            return back();
        }
        else
            return back()->withErrors('we could not found the specified notification');
    }

   
    public function delete($id) {
        $admin = Auth::guard('admin')->user();
        $notification = $admin->notifications()->where('id',$id)->first();
        if ($notification)
        {
            $notification->delete();
            return back();
        }
        else
            return back()->withErrors('we could not found the specified notification');
    }

    

    // public function markAllAsRead(){
    //     $admin = Auth::guard('admin')->user();
    //     $notifications = $admin->unreadnotifications()->update(['read_at' => Carbon::now()]);
    //     return back();
    // }
}
