<?php

namespace App\Http\Controllers\Reviewer;

use App\P3M;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Str;

class PengabdianController extends Controller
{
    public function index()
    {
        $auth_id = Auth::guard('reviewer')->user()->id;
        $datas = P3M::where('jenis_proposal', 'pengabdian')->where(function ($query) use ($auth_id) {
            $query->where('id_reviewer1', $auth_id)->orWhere('id_reviewer2', $auth_id);
        })->get();
        return view('pages.reviewer.pengabdian.index', compact('datas'));
    }

    public function download($proposal)
    {
        $file = public_path('/uploads/user/pengabdian/' . $proposal);
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


    public function pdf(Request $request, $id)
    {
        $p3m = P3M::where('id', $id)->first();

        $rules = [
            'tema' => 'required',
            'lama_teliti' => 'required|numeric',
            'biaya_usul' => 'required|numeric',
            'biaya_rekomendasi' => 'required|numeric',
        ];

        $message = [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => ':atttribute hanya boleh angka',
        ];

        $this->validate($request, $rules, $message);

        $reviewer_name = explode(' ', Auth::guard('reviewer')->user()->name);
        $name = Str::slug(date('ymd-') . Str::random(4) . '-' . $reviewer_name[0] . '-penilaian') . '.pdf';

        $pdf = PDF::loadView('pages.reviewer.pengabdian.pdf', compact('request'))->setPaper('a4')
            ->save(public_path('uploads/user/pengabdian/penilaian/' . $name));
        if ($p3m->id_reviewer1 == Auth::guard('reviewer')->user()->id) {
            $p3m->penilaian = $name;
            $p3m->nominal_rekomendasi1 = $request->biaya_rekomendasi;
        } else {
            $p3m->penilaian2 = $name;
            $p3m->nominal_rekomendasi2 = $request->biaya_rekomendasi;
        }
        $p3m->update();
        return redirect()->route('reviewer.pengabdian.index');

        // return $pdf->stream($reviewer_name[0] . '-' . Str::random(6) . '-penilaian.pdf');
    }
}
