<?php

namespace App\Http\Controllers\Reviewer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:reviewer')->except('logout');
    }

    public function getLogin()
    {
        return view('auth_reviewer.login');
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

        if (Auth::guard('reviewer')->attempt($credential)){
            return redirect()->intended(route('reviewer.penelitian.index'));
        }
        return redirect()->back()->withInput($request->only('email'));
    }

    public function logout(){
        Auth::guard('reviewer')->logout();
        return redirect()->route('reviewer.login');
    }
}
