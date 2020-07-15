<?php

namespace App\Http\Controllers\AuthCoba;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Reviewer\AuthController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Matrix\trace;

class LoginController extends Controller
{

    public function getLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try{
            if ($request->guard == 'admin'){
                $this->validate($request, [
                    'username'=> 'required',
                    'password' => 'required'
                ]);

                $credential = [
                    'email' => $request->username,
                    'password' => $request->password,
                ];

                if (Auth::guard('admin')->attempt($credential)){
                    return redirect()->intended(route('admin.akun.index'));
                }
                return redirect()->back()->withInput($request->only('username'))->with('error', 'username atau password salah');
            }
            elseif ($request->guard == 'dosen'){
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
                return redirect()->back()->withInput($request->only('username'))->with('error', 'username atau password salah');

            }
            elseif ($request->guard == 'reviewer'){
                $this->validate($request, [
                    'username'=> 'required',
                    'password' => 'required'
                ]);

                $credential = [
                    'email' => $request->username,
                    'password' => $request->password,
                ];

                if (Auth::guard('reviewer')->attempt($credential)){
                    return redirect()->intended(route('reviewer.penelitian.index'));
                }
                return redirect()->back()->withInput($request->only('username'))->with('error', 'username atau password salah');
            }else{
                $this->validate($request, [
                    'username'=> 'required',
                    'password' => 'required'
                ]);

                $credential = [
                    'email' => $request->username,
                    'password' => $request->password,
                ];

                if (Auth::guard('kap3m')->attempt($credential)){
                    return redirect()->intended(route('kap3m.home.index'));
                }
                return redirect()->back()->withInput($request->only('email'))->with('error', 'username atau password salah');
            }

            //return redirect()->back()->withInput($request->only('username'))->with('error', 'username atau password salah');
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }

}
