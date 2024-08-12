<?php

namespace App\Http\Controllers;

use App\Models\Users;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{

    public function index() {

        return view("home");

    }

    public function add_user(Request $request) {

        $validator = Validator::make($request->all(), [

            "first_name"=> ['required'],
            "last_name"=> 'nullable|min:2',
            "phone_number"=> 'required|integer|regex:/^[0-9]{10}$/',
            "email"=> 'required|email|unique:users,email',
            "username"=> 'required',
            "password"=> 'required|min:6|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[@$!%*?&])[A-Za-z0-9_@#$%&*]{6,}$/',
            "confirm_password"=> 'required_with:password|same:password'
        ],[
            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be atleast 6 characters',
            'password.regex' => 'Your password must have capital letter,small latter,digits and special characters.',
            'confirm_password'=> 'Password mismatch',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        } 


        $user = new Users();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();  

        return redirect()->route('login',['id'=>$user->id]);

    }
}
