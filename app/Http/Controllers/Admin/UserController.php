<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UsersIndex()
    {
        $users = User::all();
        $roles = Role::all();
        return view(
            'admin.user',
            [
                'users' => $users,
                'roles' => $roles
            ]
        );
    }

    public function UserEdit(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $roles = Role::all();
        return view(
            'admin.user-edit',
            [
                'users' => $users,
                'roles' => $roles
            ]
        );
    }

    public function UserUpdate(Request $request, $id)
    {
        $users = User::find($id);
        $users->email = $request->input('email');
        $users->firstname = $request->input('firstname');
        $users->lastname = $request->input('lastname');
        $users->roleid = $request->input('roleid');
        $users->status = $request->input('status');
        $users->update();

        return redirect()->route('admin.user')->with('status', $request->input('username') . ' successfully edited');
    }

    public function UserDelete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('admin.user')->with('status', 'User successfully removed');
    }

}
