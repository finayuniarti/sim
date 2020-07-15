<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
