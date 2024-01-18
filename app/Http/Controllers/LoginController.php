<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function index()
    {
        return view(
            "Login_Register.login",
            [
                "title" => "Manasik | Login",
                "active" => "login",
            ]
        );
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email:dns",
            "password" => "required"
        ]);


        if ($request->remember == "on") {
            Cookie::queue("EmailCookie", $credentials['email'], 10080);
            Cookie::queue("PassCookie", $credentials['password'], 10080);
        }

        if (Auth::attempt($credentials, true)) {
            if(Auth::user()->role_id == 4){
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            }
            $request->session()->regenerate();
            return redirect()->intended('/');

            // $user = User::where('email', $credentials['email'])->first();
            // $token = $user->createToken('auth_token')->plainTextToken;
            // $response = [
            //     'user' => $user,
            //     'token' => $token,
            // ];
            // return response($response, 201);
        }

        return back()->with('loginFailed', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        // Auth::user()->tokens->each(function ($token, $key) {
        //     $token->delete();
        // });

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
