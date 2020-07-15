<?php

namespace App\Http\Controllers\Admin;

use App\Imports\CsvImport;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AkunController extends Controller
{
    public function index(){
        $datas = User::all();
        return view('pages.admin.akun.index', compact('datas'));
    }
    public function import(Request $request){
        $this->validate($request,[
           'file' => 'required'
        ]);
        Excel::import(new CsvImport, \request()->file('file'));
        return redirect()->route('admin.akun.index');
    }
}
