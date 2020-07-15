<?php

namespace App\Http\Controllers\AuthCoba;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(){
        try{
            if (Auth::guard('web')) {
                Auth::guard('web')->logout();
                return redirect()->route('auth.login');
            }
            elseif (Auth::guard('reviewer')) {
                Auth::guard('reviewer')->logout();
                return redirect()->route('auth.login');
            }
            elseif (Auth::guard('kap3m')){
                Auth::guard('kap3m')->logout();
                return redirect()->route('auth.login');
            }
            elseif (Auth::guard('admin')){
            Auth::guard('admin')->logout();
            return redirect()->route('auth.login');
            }

        }catch (\Exception $exception){
            return $exception->getMessage();
        }

    }

}
