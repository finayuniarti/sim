<?php

namespace App\Http\Controllers\Admin;

use App\P3M;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JudulController extends Controller
{
    public function index(){
        $datas = P3M::where('terima', '2')->where('revisi', '0')->where('status', '2')->get();
        return view('pages.admin.judul.index', compact('datas'));
    }

    public function download($proposal, $jenis_proposal)
    {
        $file = public_path('/uploads/user/'.$jenis_proposal.'/'.$proposal);
        return response()->download($file);
    }

    public function downloadPenilaian($penilaian, $jenis_proposal)
    {
        $file = public_path('/uploads/user/'.$jenis_proposal.'/penilaian/'. $penilaian);
        return response()->download($file);
    }
}
