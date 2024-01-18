<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class adminController extends Controller
{
    public function index() {
        // $users = DB::table('users')->get();
        $users = DB::table('users')
            ->select('users.*', 'users.name as name', 'roles.id as id_role', 'roles.name as role_name')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->get();
            // dd($users);
        return view('admin-dashboard.index', ['users' => $users]);
    }
    
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('admin-dashboard.edit', compact('users'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->role_id);
        if($request->email !== null){
            $this->validate($request, [
                'email' => 'email',
            ]);
        }
        if($request->password !== null){
            $this->validate($request, [
                'password' => 'min:6'
            ]);
        }
        // if ($file = $request->file('foto')) {
        //     //insert new file
        //     $destinationPath = 'upload/user/'; // upload path
        //     $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
        //     $file->move($destinationPath, $profileImage);
        //     $details['image'] = "$profileImage";
        // }
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ]);

        if ($user) {
            return redirect('admin')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        if ($user) {
            return redirect('admin')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect('admin')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
