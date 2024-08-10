<?php

namespace App\Http\Controllers;

use App\Models\Users;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index() {

        return view("home");

    }

    public function add_user(Request $request) {

        $validated = $request->validate([

            "first_name"=> ['required'],
            "phone_number"=> 'required | Integer',
            "email"=> ['required'],
            "username"=> ['required'],
            "password"=> "required"
        ]);


        $user = new Users();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();  

        return redirect()->back();

    }
}
