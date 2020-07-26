<?php

namespace App\Http\Controllers\Admin;

use App\HKI;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HkiController extends Controller
{
    public function index(){
        $datas = HKI::all();
        return view('pages.admin.hki.index', compact('datas'));
    }
}
