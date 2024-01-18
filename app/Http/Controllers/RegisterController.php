<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view("Login_Register.register", [
            "title" => "Manasik | Register",
            "active" => "register"
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            "username" => "required|min:5",
            "email" => "required|email:dns|unique:users",
            "password" => "required|min:8",
            "name" => "required|min:3",
            "confirmPassword" => "required|same:password",
            "address" => "required|min:10",
            "gender" => "required",
            "dob" => "required"
        ]);


        $validatedData['password'] = Hash::make($validatedData['password']);

        // User::create($validatedData);
        $user = new User;
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->name = $validatedData['name'];
        $user->address = $validatedData['address'];
        $user->gender = $validatedData['gender'];
        $user->dob = $validatedData['dob'];
        $user->role_id = 2;

        // $response = [
        //     'user' => $user,
        //     'token' => $token,
        // ];

        $user->save();
        $user->createToken('auth_token')->plainTextToken;
        return redirect('/login')->with('success', 'Registration successfull!, Please login');
    }
}
