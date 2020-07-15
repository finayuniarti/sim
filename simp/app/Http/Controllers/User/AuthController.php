<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function getLogin()
    {
        return view('auth_user.login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
           'username' => 'required',
           'password' => 'required'
        ]);

        $credential = [
            'nidn' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('web')->attempt($credential)){
            return redirect()->intended(route('user.home.index'));
        }
        return redirect()->back()->withInput($request->only('username'));

    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }
}
