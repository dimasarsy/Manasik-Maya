<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class adminRolesController extends Controller
{
    public function index() {
        $roles = DB::table('Roles')
            ->get();
            // dd($roles);
        return view('admin-dashboard.roles.index', ['roles' => $roles]);
    }
    public function create(){
        return view('admin-dashboard.roles.create');
    }
    public function store(Request $request)
    {
        $roles = DB::table('roles')->insert([
            'nama' => $request->name,
        ]);

        if ($roles) {
            return redirect('admin/roles')
                ->with([
                    'success' => 'Post has been added successfully'
                ]);
        } else {
            return redirect('admin/roles')
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }
    public function edit($id) {
        $roles = Role::findOrFail($id);
        return view('admin-dashboard.roles.edit', compact('roles'));
    }
    public function update(Request $request, $id)
    {
        $roles = Role::findOrFail($id);
        $roles->update([
            'name' => $request->name,
        ]);

        if ($roles) {
            return redirect('admin/roles')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect('admin/roles')
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }
}
