<?php

namespace App\Http\Controllers\Reviewer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenilaianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:reviewer');
    }

    public function index()
    {
        return view('pages.reviewer.nilai.index');
    }


}
