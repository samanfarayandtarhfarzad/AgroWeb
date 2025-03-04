<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::USERPAGE;

    // protected function redirectTo()
    // {
    //     if((Auth::user()->rolid == 1)){
    //         return '/register';
    //     }else{
    //         return '/dashboard';
    //     }
    // }

    /**s
     * Create a new controller instance.s
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:32', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:64', 'unique:users'], 
            'password' => ['required', 'string', 'min:8', 'confirmed'],  
            'firstname' => ['required','string', 'max:32'], 
            'lastname' => ['required','string', 'max:32'], 
            'roleid' => ['required','string'], 
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'], 
            'password' => Hash::make($data['password']),
            // 'password' => md5($data['password']),    
            'firstname' => $data['firstname'], 
            'lastname' => $data['lastname'],
            'roleid' => $data['roleid'], 

        ]);
    }
}
