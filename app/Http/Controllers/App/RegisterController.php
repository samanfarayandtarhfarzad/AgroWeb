<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\App\mb5;
use App\Http\Resources\Member as MemberResources;

class RegisterController extends Controller
{
    public function Create(Request $request)
    {
        $result = ['result' => 'username_error'];

        if(!empty($request->email)){
            $resault_email = Member::where('email', $request->email)->count();
            $resault_username = Member::where('username', $request->username)->count();
            $resault_phone = Member::where('phone', $request->phone)->count();

            if(!empty($resault_username)){
                return response()->json(['data' => $result]);
            }else {
                if(!empty($resault_phone)){
                    return response()->json(['data' => $result]);
                }else {
                    if(!empty($resault_email)){
                        return response()->json(['data' => $result]);
                    }
                    else{
                        $member = Member::create([
                            'username' => $request->username,
                            'phone' => $request->phone,
                            'email' => $request->email,
                            'password' => $request->password,
                            'firstname' => $request->firstname,
                            'lastname' => $request->lastname,
                            'roleid' => $request->roleid,
                            'city_id' => $request->city_id,
                            'zipcode' => $request->zipcode,
                            'gender' => $request->gender,
                            'birthdate' => $request->birthdate,
                            'lastlogin' => $request->lastlogin,
                            'status' => $request->status
                        ]);

                        return response()->json([
                            'data' => [
                                'result' => 'ok', 
                                'username' => $member->username, 
                                'phone' => $member->phone, 
                                'email' => $member->email, 
                                'password' => $member->password, 
                                'firstname' => $member->firstname, 
                                'lastname' => $member->lastname, 
                                'roleid' => $member->roleid, 
                                'city_id' => $member->city_id, 
                                'zipcode' => $member->zipcode, 
                                'gender' => $member->gender, 
                                'birthdate' => $member->birthdate, 
                                'lastlogin' => $member->lastlogin, 
                                'status' => $member->status
                                ]
                            ]);

                        // return new MemberResources($member);

                    }
                }
            }

        }else {
            $resault_username = Member::where('username', $request->username)->count();
            $resault_phone = Member::where('phone', $request->phone)->count();

            if(!empty($resault_username)){
                return response()->json(['data' => $result]);
            }else {
                if(!empty($resault_phone)){
                    return response()->json(['data' => $result]);
                }else {
                        $member = Member::create([
                            'username' => $request->username,
                            'phone' => $request->phone,
                            'email' => $request->email,
                            'password' => $request->password,
                            'firstname' => $request->firstname,
                            'lastname' => $request->lastname,
                            'roleid' => $request->roleid,
                            'city_id' => $request->city_id,
                            'zipcode' => $request->zipcode,
                            'gender' => $request->gender,
                            'birthdate' => $request->birthdate,
                            'lastlogin' => $request->lastlogin,
                            'status' => $request->status
                        ]);

                        return response()->json([
                            'data' => [
                                'result' => 'ok', 
                                'username' => $member->username, 
                                'phone' => $member->phone, 
                                'email' => $member->email, 
                                'password' => $member->password, 
                                'firstname' => $member->firstname, 
                                'lastname' => $member->lastname, 
                                'roleid' => $member->roleid, 
                                'city_id' => $member->city_id, 
                                'zipcode' => $member->zipcode, 
                                'gender' => $member->gender, 
                                'birthdate' => $member->birthdate, 
                                'lastlogin' => $member->lastlogin, 
                                'status' => $member->status
                                ]
                            ]);

                        // return response()->json($member);
                        // return new MemberResources($member);
                }
            }
        }


    }
}
