<?php

namespace App\Http\Controllers\Reviewer;

use App\P3M;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

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
    public function pdf(Request $request)
    {
        $rules = [
            'tema' => 'required',
            'lama_teliti' => 'required|numeric',
            'biaya_usul' => 'required|numeric',
            'biaya_rekomendasi' => 'required|numeric',
        ];

        $message =[
            'required' => ':attribute tidak boleh kosong',
            'numeric' => ':atttribute hanya boleh angka',
        ];

        $this->validate($request, $rules, $message);

//        return view('pages.reviewer.penelitian.pdf');
        $pdf = PDF::loadView('pages.reviewer.pengabdian.pdf', compact('request'))->setPaper('a4');
//      //PDF::loadView('pages.admin.beasiswa.pdf', $data);
        return $pdf->stream('laporan-pdf.pdf');
    }
}
