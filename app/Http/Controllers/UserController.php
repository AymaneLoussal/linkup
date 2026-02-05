<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');
        $me = auth()->id();

        $users = User::where('username', 'ILIKE', "%$query%") // PostgreSQL friendly
        ->where('id', '!=', $me)
            ->limit(10)
            ->get()
            ->map(function ($user) {
                $user->friend_status = auth()->user()
                    ->friendStatusWith($user->id);
                return $user;
            });

        return view('dashboard', compact('users', 'query'));
    }
}
