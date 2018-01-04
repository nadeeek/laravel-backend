<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
     public function create(Request $request)
    {
        $data = $request->json()->all();
        return User::create([
            'name' => $data['user']['name'],
            'email' => $data['user']['email'],
            'password' => bcrypt($data['user']['password']),
        ]);
    }

    public function login(Request $request)
    {
    // $userdata = array(
    // 			'username' => Input::get('username') ,
    // 			'password' => Input::get('password')
    // 		);

        $userdata = $request->json()->all();
        // dd($userdata['username']);die;

        if (Auth::attempt(['email' => $userdata['email'], 'password' => $userdata['password']]))
            {
            return response()->json(['message' => 'Logging Successful'], 200);
            }
            else
            {
            return response()->json(['message' => 'error in logging'], 404);
            }
      
    }

   
}
