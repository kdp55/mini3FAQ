<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function index()
    {
        return view('followuser', [
            'users' => User::where('id', '!=', Auth::id())->get()
        ]);
    }
    public function follow(User $user)
    {
        if (!Auth::user()->following($user->id)) {
            // Create a new follow instance for the authenticated user

            Auth::user()->follows()->create([
                'follow_id' => $user->id,
            ]);

            return redirect()->route('users.index');
        } else {
            return redirect()->route('users.index');
        }
    }
    public function unfollow(User $user)
    {
        if (Auth::user()->following($user->id)) {
            $follow = Auth::user()->follows()->where('follow_id', $user->id)->first();
            $follow->delete();
            return redirect()->route('users.index');
        } else {
            return redirect()->route('users.index');
        }
    }
    /*public function show(int $users)
    {
        $user = User::find($userId);
        $followers = $user->follows();
        $followings = $user->f;
        return view('user.show', compact('user', 'followers' , 'followings');
    }*/

}


/*if (!Auth::user()->followings($user->id)) {
    // Create a new follow instance for the authenticated user
    Auth::user()->followers()->create([
        'follower_id' => $user->id,
    ]);
    return redirect()->route('users.index');
} else {
    return redirect()->route('users.index');
}*/

/*if (Auth::user()->followings($user->id)) {
    $follow = Auth::user()->follows()->where('follower_id', $user->id)->first();
    return redirect()->route('users.index');
} else {
    return redirect()->route('users.index');
}*/