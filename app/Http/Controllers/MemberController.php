<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Http\Resources\Member as MemberResources;

class MemberController extends Controller
{
    public function members()
    {
        return MemberResources::collection(Member::all());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MemberResources::collection(Member::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->username) {
            $member = Member::create([
                'username' => $request->username,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => md5($request->password),
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
    
            return new MemberResources($member);
        } else {
            return response()->json(['resault' => 'error']);
        }
        

        //$member = Member::created($request->all());
        

        //return response()->json(['resault' => 'error']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return new MemberResources($member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        $member->update($request->all());
        return new MemberResources($member);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return new MemberResources($member);
    }
}
