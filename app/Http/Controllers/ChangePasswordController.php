<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view("ChangePassword_View.change_password", [
            "title" => "KeyPedia | Change Password",
            "active" => "change_password",
        ]);
    }

    public function update_password(Request $request)
    {

        $validatedData = $request->validate([
            "currPassword" => "required",
            "newPassword" => "required|min:8",
            "newConfPassword" => "required|same:newPassword",
        ]);

        $currUser = auth()->user();

        if (Hash::check($request->currPassword, $currUser->password)) {

            User::find(auth()->user()->id)->update(['password' => Hash::make($validatedData['newPassword'])]);

            return redirect()->back()->with('success', 'Password successfully updated!');
        } else {
            return redirect()->back()->with('error', 'Current password does not matched!');
        }
    }
}
