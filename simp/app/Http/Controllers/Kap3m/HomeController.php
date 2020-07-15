<?php

namespace App\Http\Controllers\Kap3m;

use App\KaP3M;
use App\P3M;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:kap3m');
    }

    public function index()
    {
        $datas = P3M::where('status', '2')->where('revisi', '0')->where('terima', '1')->get();
        return view('pages.kap3m.home.index', compact('datas'));
    }

    public function download($proposal, $jenis_proposal)
    {
        $file = public_path('/uploads/user/'.$jenis_proposal.'/'.$proposal);
        return response()->download($file);
    }

    public function tolak($id)
    {
        $p3m = P3M::findOrFail($id);
        $p3m->terima = '0';
        $p3m->update();

        return redirect()->route('kap3m.home.index')->with('success', 'berhasil menolak proposal');
    }

    public function terima($id)
    {
        $p3m = P3M::findOrFail($id);
        $p3m->terima = '2';
        $p3m->update();

        return redirect()->route('kap3m.home.index')->with('success', 'berhasil terima proposal');
    }
}
