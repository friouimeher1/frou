<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Admin;
use App\ContacterAdmin;
use App\ContacterUser;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Commercant;
class GererUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.user.user',compact('users'));
    }
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
    //disply all mesage to admin

    public function getContactUser(){
      $contact=ContacterAdmin::all();

      return view('admin.user.contact',compact('contact'));
    }
    //delete massage user
    public function destroyContactUser($id){
      ContacterAdmin::find($id)->delete();

      return redirect()->route('admin.getContact');
    }
    //repondre to user
    public function replyToUser($id){
      $admin=Admin::first();
      //dd($admin);
      //dd($id);
      $user=User::where('id',$id)->first();

      //dd($user);
      return view('admin.user.envoyermail',compact('admin','user'));
    }
    //this function use to store data
    public function storereply($id,Request $request){
      ContacterUser::create([
        'user_id'=>$id,
        'sujet'=>$request->sujet,
        'message'=>$request->message,
        'role'=>$request->email_admin,
      ]);
      session()->flash('message', 'message envoyer avec success');
      return redirect()->route('admin.getContact');
    }
    //show paricular message for user

    public function showmessagetouser(){
      $users=User::where('id',Auth::guard('user')->user()->id)->first();
      //dd($users);
      $contacteruser=ContacterUser::all();
      //foreach ($users as $user) {
        //dd($user->id);
        $contact=ContacterUser::where('user_id',$users->id)->get();
      //}
      //dd($contact);
      return view('admin.user.repondreadmin',compact('contact'));
    }
    public function destroyreply($id)
    {
         ContacterUser::find($id)->delete();
  return redirect()->route('admin.showmessagetouser');
    }


    public function charts()
        {
        $userCounts = User::select(DB::raw('month(created_at) as month'),DB::raw('count(name) as `count`'))
                ->groupBy('month')->get();
        $chartData = (sizeof($userCounts) > 0) ? $userCounts : null;

        if ($chartData) {
            return view('admin.statistique',array('chartData' => $chartData));
        }
        else {
            return view('admin.home');
        }
        }
        public function chartscutomer()
            {
            $userCounts = Commercant::select(DB::raw('month(created_at) as month'),DB::raw('count(name) as `count`'))
                    ->groupBy('month')->get();
            $chartData1 = (sizeof($userCounts) > 0) ? $userCounts : null;

            if ($chartData1) {
                return view('admin.customer.statistique',compact('chartData1'));
            }
            else {
                return view('admin.home');
            }
            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         User::find($id)->delete();
  return redirect()->route('User.index');
    }
}
