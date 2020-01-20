<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Member extends JsonResource
{
    /**
     * Transform the resource into an array.z
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'resault' => 'ok',
            'id' => $this->id,
            'username' => $this->username,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => $this->password,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'roleid' => $this->roleid,
            'city_id' => $this->city_id,
            'zipcode' => $this->zipcode,
            'gender' => $this->gender,
            'birthdate' => $this->birthdate,
            'lastlogin' => $this->lastlogin,
            'status' => $this->status
        ];
    }
}
