<?php

namespace App\Http\Controllers\Admin;

use App\Imports\CsvImport;
use App\Imports\ReviewerImport;
use App\Reviewer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AkunReviewerController extends Controller
{
    public function index(){
        $datas = Reviewer::all();
        return view('pages.admin.akun.reviewer.index', compact('datas'));
    }
    public function import(Request $request){
        $this->validate($request,[
            'file' => 'required'
        ]);
        Excel::import(new ReviewerImport(), \request()->file('file'));
        return redirect()->route('admin.reviewer.index');
    }
}
