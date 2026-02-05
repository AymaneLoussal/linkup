<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Http\Request;

class FriendRequestController extends Controller
{
    //
    public function send(User $user){
        $me = auth()->id();
        if($me == $user->id){
            return back();
        }
        FriendRequest::firstOrCreate([
            'sender_id' => $me,
            'receiver_id' => $user->id,
        ]);
        return back()->with('status', 'Friend request sent');
    }
    public function accept(FriendRequest $request){
        if($request->receiver_id != auth()->id()){
            abort(403);
        }
        $request->update(['status' => 'accepted']);
        return back()->with('status', 'Friend request accepted');
    }

    public function decline(FriendRequest $request){
        if($request->receiver_id != auth()->id()){
            abort(403);
        }
        $request->update(['status' => 'declined']);
        return back()->with('status', 'Friend request declined');
    }

}
