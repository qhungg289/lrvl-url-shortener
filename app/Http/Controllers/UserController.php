<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = User::find(Auth::id());

        return view('profile.index', [
            'links' => $user->links
        ]);
    }
}
