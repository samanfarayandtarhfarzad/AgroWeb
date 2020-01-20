<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendMailable;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function DashboardIndex()
    {
        return view('admin.dashboard');
    }

    public function mail()
    {
        $to_name = 'TO_samanfarayandtarh';
        $to_email = '1mohammadsalehpour@gmail.com';
        $data = array('name' => "Sam Jose", "body" => "Test mail");

        Mail::send('emails.name', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Artisans Web Testing Mail');
            $message->from('samanfarayandtarh.salehpour@gmail.com', 'Mohammad');
        });

        // $name = 'Mohammad';
        // Mail::to('samanfarayandtarh.salehpour@gmail.com')->send(new SendMailable($name));

        // return 'Email was sent successfully';
    }
}
