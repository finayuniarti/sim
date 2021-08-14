<?php

namespace App\Http\Controllers\Admin;

use App\P3M;
use App\Reviewer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PenelitianController extends Controller
{
    public function index()
    {
        // $auth = Auth::guard('admin')->user()->bidang_penelitian;
        // bidang peneltian == 'teknik'
        $datas = P3M::where('jenis_proposal', 'penelitian')->get();
        return view('pages.admin.judul.penelitian.index', compact('datas'));
    }
    public function download($proposal, $jenis_proposal)
    {
        $file = public_path('/uploads/user/' . $jenis_proposal . '/' . $proposal);
        return response()->download($file);
    }

    public function downloadPenilaian($penilaian, $jenis_proposal)
    {
        $file = public_path('/uploads/user/' . $jenis_proposal . '/penilaian/' . $penilaian);
        return response()->download($file);
    }

    public function getReviewer($id)
    {
        $p3m = P3M::findOrFail($id);
        $reviewers = Reviewer::where('bidang_penelitian', $p3m->bidang_penelitian)->get();
        return $reviewers;
    }

    public function chooseReviewer(Request $request)
    {
        $p3m = P3M::where('id', $request->id)->first();
        $p3m->id_reviewer1 = $request->id_reviewer1;
        $p3m->id_reviewer2 = $request->id_reviewer2;
        $p3m->update();

        return redirect()->route('admin.judul.penelitian.index')->with('success', 'berhasil memilih reviewer');
    }
}
