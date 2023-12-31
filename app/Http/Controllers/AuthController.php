<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->all();
        return response()->json($data, 200);
    }
}
