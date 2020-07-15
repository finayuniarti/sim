<?php

namespace App\Http\Controllers\Kap3m;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:kap3m')->except('logout');
    }

    public function getLogin()
    {
        return view('auth_kap3m.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'=> 'required',
            'password' => 'required'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('kap3m')->attempt($credential)){
            return redirect()->intended(route('kap3m.home.index'));
        }
        return redirect()->back()->withInput($request->only('email'));
    }

    public function logout(){
        Auth::guard('kap3m')->logout();
        return redirect()->route('kap3m.login');
    }

}
