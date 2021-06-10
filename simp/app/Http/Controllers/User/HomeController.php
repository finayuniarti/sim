<?php

namespace App\Http\Controllers\User;

use App\Anggota;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web')->except('index');
    }

    public function index()
    {
        return view('pages.user.home.index');
    }

    public function notify()
    {
        $notify = Anggota::where('id_anggota', Auth::guard('web')->user()->id)->get();
        return $notify;
    }
}
