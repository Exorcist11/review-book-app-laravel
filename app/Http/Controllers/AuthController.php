<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Controller display Register
    public function create(): View
    {
        return view('client.register');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->username = $request->input('username');
        $user->phoneNumber = $request->input('phoneNumber');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        return redirect('/login');
    }

    public function createLogin(): View
    {
        return view('client.login');
    }

    public function storeLogin(Request $request)
    {
        // getValue from input
        $email = $request->input('email');
        $password = $request->input('password');
        // getValue from databse
        print_r($email);

        return redirect('/');
    }
}
