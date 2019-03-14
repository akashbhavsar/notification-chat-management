<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Notification;
use App\Models\Category;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $user = Auth::user();

        $category = Category::All();
        //dd($user->unreadnotifications);
        $notification  = count($user->unreadnotifications);
        //dd($count_notification);
        return view('home',compact('user','notification','category'));
    }
    public function readNotification()
    {
        $user = Auth::user();
    
        // read notification
        foreach ($user->unreadnotifications as $notification) {
             $notification->markAsRead();
        }

        if($user) 
        {
            $data = 1;
            return response()->json($data);
        }

    }   
}
