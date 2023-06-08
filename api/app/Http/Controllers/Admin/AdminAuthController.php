<?php

namespace App\Http\Controllers\Admin;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins;

class AdminAuthController extends Controller
{
    public function Login(Request $request)
    {
        // echo Hash::make("123456");
        return view("admin/login");
    }

    public function LoginAction(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        // // $credentials = $request->only('email', 'password');
        // // if (Admins::where($credentials)) {
        // //     return redirect()->intended('dashboard')->withSuccess('Signed in');
        // // }
        // return redirect("login")->withSuccess('Login details are not valid');
    }
}
