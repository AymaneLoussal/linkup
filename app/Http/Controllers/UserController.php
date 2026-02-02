<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class UserController extends Controller
{
    //
    public function search(Request $request)
    {
        $query = $request->input('q');

        $users = \App\Models\User::where('username', 'like', "%$query%")
            ->where('id', '!=', auth()->id())
            ->limit(10)
            ->get();

        return view('dashboard', compact('users', 'query'));
    }

}
