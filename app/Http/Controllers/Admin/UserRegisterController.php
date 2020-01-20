<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    public function ShowRegisterForm()
    {
        $roles = Role::all();
        return view('auth.user-register', ['roles' => $roles]);
    }

    public function Register(Request $request)
    {
        $this->validation($request);
        //User::create($request->all());
        User::create([
            'username' => $request['username'],
            'email' => $request['email'], 
            'password' => Hash::make($request['password']),
            // 'password' => md5($data['password']),    
            'firstname' => $request['firstname'], 
            'lastname' => $request['lastname'],
            'roleid' => $request['roleid'], 

        ]);
        return redirect()->route('auth.user-register')->with('status', 'User Registred successfully');
    }

    public function validation($request)
    {
        return $this->validate($request, [
            'username' => ['required', 'string', 'max:32', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:64', 'unique:users'], 
            'password' => ['required', 'string', 'min:8', 'confirmed'],  
            'firstname' => ['required','string', 'max:32'], 
            'lastname' => ['required','string', 'max:32'], 
            'roleid' => ['required','string'], 
        ]);
    }
}
