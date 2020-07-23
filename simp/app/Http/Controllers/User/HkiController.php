<?php

namespace App\Http\Controllers\User;

use App\HKI;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HkiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function create()
    {
        $datas = User::where('id', '!=', Auth::guard('web')->user()->id)->get();
        return view('pages.user.hki.create', compact('datas'));
    }

    public function store(Request $request)
    {
        $rules = [
            'judul_cipta' => 'required|regex:/^[a-zA-Z][a-zA-Z ]*$/',
            'alamat' => 'required',
        ];

        $message =[
            'required' => ':attribute tidak boleh angka',
            'regex' => ':attribute tidak boleh angka',
        ];
        $this->validate($request, $rules, $message);

        $data = new HKI();
        $data->id_user = Auth::guard('web')->user()->id;
        $data->name = Auth::guard('web')->user()->name;
        $data->alamat = $request->alamat;
        $data->kewarganegaraan = $request->kewarganegaraan;
        $data->judul_cipta = $request->judul_cipta;
        $data->save();

        return redirect()->route('user.home.index');
    }
}
