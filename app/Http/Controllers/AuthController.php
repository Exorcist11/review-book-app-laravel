<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'username' => $request->username,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $res = [
            'status' => true,
            'message' => 'Create user successfully',
            'author' => $user
        ];
        return response()->json($res, 200);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $isEmail = User::where('email', $email)->first();

        if (is_null($isEmail)) {
            $res = [
                'success' => false,
                'message' => 'Email is not valid',
                'res' => $email
            ];
            return response()->json($res, 200);
        } else {
            $check = Hash::check($password, $isEmail->password);
            if ($check == false) {
                $res = [
                    'success' => false,
                    'message' => 'Wrong password',
                ];
                return response()->json($res, 200);
            }
            $res = [
                'success' => true,
                'message' => 'Login successfully',
                'user' => $isEmail
            ];
            return response()->json($res, 200);
        }
    }
}
