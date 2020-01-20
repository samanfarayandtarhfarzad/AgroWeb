<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function RoleIndex()
    {
        $roles = Role::all();
        return view('auth.register', ['roles' => $roles]);
    }
}
