<?php

namespace App\Http\Controllers\Reviewer;

use App\P3M;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengabdianController extends Controller
{
    public function index()
    {
        $auth = Auth::guard('reviewer')->user()->bidang_penelitian;
        $datas = P3M::where('bidang_penelitian', $auth)
            ->where('jenis_proposal','pengabdian')
            ->get();
        return view('pages.reviewer.pengabdian.index', compact('datas'));
    }

    public function download($proposal)
    {
        $file = public_path('/uploads/user/pengabdian/'.$proposal);
        return response()->download($file);
    }

    public function getRevisiProposal($id)
    {
        $data = P3M::findOrFail($id);
        return view('pages.reviewer.pengabdian.revisi_proposal', compact('data'));
    }

    public function revisiProposal(Request $request, $id)
    {
        $data = P3M::findOrFail($id);
        $data->revisi_proposal = $request->revisi_proposal;
        $data->revisi = '2';
        $data->update();

        return redirect()->route('reviewer.pengabdian.index')->with('success', 'revisi telah dikirim');
    }
    public function acc($id)
    {
        $data = P3M::findOrFail($id);
        $data->status = '2';
        $data->revisi = '0';
        $data->update();

        return redirect()->route('reviewer.pengabdian.index')->with('success', 'proposal telah acc');
    }
    public function nilai($id)
    {
        $pengabdian = P3M::findOrFail($id);
        return view('pages.reviewer.pengabdian.nilai', compact('pengabdian'));
    }
}
