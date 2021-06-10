<?php

namespace App\Http\Controllers\User;

use App\Anggota;
use App\P3M;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class PengabdianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function create()
    {
        $datas = User::where('id', '!=', Auth::guard('web')->user()->id)->get();
        return view('pages.user.pengabdian.create', compact('datas'));
    }

    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required|regex:/^[a-zA-Z][a-zA-Z ]*$/',
            'proposal' => 'required|mimetypes:application/pdf, application/x-pdf,application/acrobat, applications/vnd.pdf, text/pdf, text/x-pdf|max:5120|file',
            'nominal' => 'required|numeric',
        ];

        $message = [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => ':attribute tidak boleh kosong',
            'mimes' => ':attribute hanya boleh pdf',
            'regex' => ':attribute hanya boleh huruf dan spasi',
        ];

        $this->validate($request, $rules, $message);
//        dd($request->MailNotify);

        $proposal = $request->file('proposal');
        $name = date('ymdHis') . "-" . $proposal->getClientOriginalName();
        $destinationPath = public_path('uploads/user/pengabdian');
        $proposal->move($destinationPath, $name);

        $data = new P3M();
        $data->id_user = Auth::guard('web')->user()->id;
        $data->jenis_proposal = 'pengabdian';
        $data->judul = $request->judul;
        $data->tahun = $request->tahun;
        $data->nominal = $request->nominal;
        $data->proposal = $name;
        $data->bidang_penelitian = $request->bidang_penelitian;
        $data->save();

        $anggotas = $request->anggota;
        if (is_array($anggotas)){
            foreach ($anggotas as $anggota){
                $item = [
                    'id_p3m' => $data->id,
                    'id_user' => Auth::guard('web')->user()->id,
                    'id_anggota' => $anggota,
                    'email' => Auth::guard('web')->user()->email
                ];
                $ang = Anggota::create($item);
                $ang->user->sendNotify('success');

            }
        }
        Mail::to("yuniafina4@gmail.com")->send(new MailNotify());
        return redirect()->route('user.home.index');
    }

    public function revisian()
    {
        $datas = P3M::where('id_user', Auth::guard('web')->user()->id)->where('revisi_proposal', '!=', 'null')->where('jenis_proposal', 'pengabdian')->get();
        return view('pages.user.pengabdian.revisian', compact('datas'));
    }

    public function download()
    {

    }

    public function uploadProposalAgain(Request $request, $id)
    {
        $proposal = $request->file('proposal');
        //dd($proposal->getClientOriginalName());
        $name = date('ymdHis') . "-" . $proposal->getClientOriginalName();
        $destinationPath = public_path('uploads/user/pengabdian');
        $proposal->move($destinationPath, $name);

        $data = P3M::findOrFail($id);
        $data->proposal = $name;
        $data->revisi = '1';
        $data->update();

        return redirect()->route('user.pengabdian.revisi')->with('success', 'berhasil upload proposal lagi');
    }
}
