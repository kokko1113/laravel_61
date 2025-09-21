<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect(route("dash"));
        }
        return view("login");
    }

    public function check(Request $request)
    {
        $check = $request->only("email", "password");
        if (Auth::attempt($check)) {
            $request->session()->regenerate();
            return redirect(route("dash"));
        }
        return back()->withErrors(["error" => "メールアドレスまたはパスワードが正しくありません"]);
    }

    public function dash()
    {
        // dd("aaa");
        return view("dash");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect(route("login"));
    }
}
