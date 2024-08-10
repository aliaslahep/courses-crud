<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;

use App\Models\Register;
use Illuminate\Http\Request;
use app\Models\User;

class RegisterController extends Controller
{

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique',
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        Register::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
            
        ]);

        return redirect('/login')->with('success', 'Registration successful! Please log in.');

    }


}
