<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.home');
    }

    public function getLogin()
    {
        return view('client.login');
    }

    public function getRegister()
    {
        return view('client.register');
    }
}
