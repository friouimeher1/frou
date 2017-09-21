<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\user;
class ApproveController extends Controller
{
   public function approve(Request $request)
    {
        $post = User::find($request->userId);
        $approveVal = $request->approve;
        if($approveVal == 'on'){
        	$approveVal = 1;
        }else{
        	$approveVal = 0;
        }
        $post->approve = $approveVal;
        $post->save();
        return back();
    }
}
