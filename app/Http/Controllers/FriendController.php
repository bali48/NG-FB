<?php

namespace App\Http\Controllers;

use App\Events\FriendRequestEvent;
use App\Friends;
use App\Notifications\FriendRequestNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;



class FriendController extends Controller
{
    public function friendRequest(Request $request){
        $request->validate([
           'user_id'   => 'required',
           'friend_id' =>  'required',
        ]);
        $friend = new Friends([
            'user_id'               => $request->user_id,
            'friend_id'             => $request->friend_id,
            'friendRequestStatus_id'=> ($request->friendRequestStatus_id) ?? 2
        ]);
        $friend->save();
        $from = User::find($friend->user_id);
        $sendto = User::find($friend->friend_id);
        $notification = array(
            'sender_name' => User::find($friend->user_id)->name,
            'sendtime'  => $friend->created_at
        );
        $sendto->notify(new FriendRequestNotification($from));
//        Notification::send([$sendto], new FriendRequestNotification($from));
//        Notification::(new FriendRequestNotification($from));

        event(new FriendRequestEvent($notification));
        return response()->json([
            'message' => 'Friend Request Send!'
        ], 201);

    }
}
