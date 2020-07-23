<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        return view('pages.user.laporan.index');
    }

    public function store(Request $request)
    {

        $rules = [
            'tanggal_pelaksanaan' => 'required|date',
            'tanggal_pemantauan' => 'required|date',
            'judul' => 'required',
        ];

        $message = [
            'required' => ':attribute tidak boleh kosong',
        ];

        $this->validate($request, $rules, $message);
    }
}
