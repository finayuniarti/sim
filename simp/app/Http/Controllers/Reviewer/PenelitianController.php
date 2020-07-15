<?php

namespace App\Http\Controllers\Reviewer;

use App\P3M;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Novay\WordTemplate\WordTemplate;

class PenelitianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:reviewer');
    }

    public function index()
    {
        $auth = Auth::guard('reviewer')->user()->bidang_penelitian;
        // bidang peneltian == 'teknik'
        $datas = P3M::where('bidang_penelitian', $auth)
            ->where('jenis_proposal','penelitian')
            ->get();
        return view('pages.reviewer.penelitian.index', compact('datas'));
    }

    public function download($proposal)
    {
        $file = public_path('/uploads/user/penelitian/'.$proposal);
        return response()->download($file);
    }

    public function getRevisiProposal($id)
    {
        $data = P3M::findOrFail($id);
        return view('pages.reviewer.penelitian.revisi_proposal', compact('data'));
    }

    public function revisiProposal(Request $request, $id)
    {
        $data = P3M::findOrFail($id);
        $data->revisi_proposal = $request->revisi_proposal;
        $data->revisi = '2';
        $data->update();

        return redirect()->route('reviewer.penelitian.index')->with('success', 'revisi telah dikirim');
    }

    public function acc($id)
    {
        $data = P3M::findOrFail($id);
        $data->status = '2';
        $data->revisi = '0';
        $data->update();

        return redirect()->route('reviewer.penelitian.index')->with('success', 'proposal telah acc');
    }

//    public function nilai()
//    {
//        $this->showEditpdf();
//        return view('pages.reviewer.penelitian.nilai');
//    }

    private function showEditpdf()
    {
        $file = public_path('word/Penilaian.rtf');
        $array = array(
            '[NOMOR_SURAT]' => '015/BT/SK/V/2017',
            '[PERUSAHAAN]' => 'CV. Borneo Teknomedia',
            '[NAMA]' => 'Melani Malik',
            '[NIP]' => '6472065508XXXX',
            '[ALAMAT]' => 'Jl. Manunggal Gg. 8 Loa Bakung, Samarinda',
            '[PERMOHONAN]' => 'Permohonan pengurusan pembuatan NPWP',
            '[KOTA]' => 'Samarinda',
            '[DIRECTOR]' => 'Noviyanto Rahmadi',
            '[TANGGAL]' => date('d F Y'),
        );

        $nama_file = 'surat-keterangan-kerja.doc';

        return WordTemplate::export($file, $array, $nama_file);
    }

    public function nilai($id)
    {
        $penelitian = P3M::findOrFail($id);
        return view('pages.reviewer.penelitian.nilai', compact('penelitian'));
    }

    public function pdf()
    {
        return view('pages.reviewer.penelitian.pdf');
    }
}
