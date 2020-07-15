<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HkiController extends Controller
{
    public function index(){
        return view('pages.admin.hki.index');
    }
}
