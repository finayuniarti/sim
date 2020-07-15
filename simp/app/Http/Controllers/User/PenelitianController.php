<?php

namespace App\Http\Controllers\User;

use App\P3M;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenelitianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function create()
    {
        $datas = User::where('id', '!=', Auth::guard('web')->user()->id)->get();
        return view('pages.user.penelitian.create', compact('datas'));
    }

    public function store(Request $request)
    {
        $proposal = $request->file('proposal');
        //dd($proposal->getClientOriginalName());
        $name = $proposal->getClientOriginalName();
        $destinationPath = public_path('uploads/user/penelitian');
        $proposal->move($destinationPath, $name);

        $data = new P3M();
        $data->id_user = Auth::guard('web')->user()->id;
        $data->jenis_proposal = 'penelitian';
        $data->judul = $request->judul;
        $data->tahun = $request->tahun;
        $data->nominal = $request->nominal;
        $data->proposal = $name;
        $data->bidang_penelitian = $request->bidang_penelitian;
        $data->save();

        $anggotas = $request->anggota;
        foreach ($anggotas as $anggota) {
            $item[] = [
                'id_p3m' => $data->id,
                'id_user' => Auth::guard('web')->user()->id,
                'id_anggota' => $anggota
            ];
        }
        DB::table('anggotas')->insert($item);

        return redirect()->route('user.home.index');
    }

    public function revisian()
    {
        $datas = P3M::where('id_user', Auth::guard('web')->user()->id)->where('revisi_proposal', '!=', 'null')->where('jenis_proposal', 'penelitian')->get();
        return view('pages.user.penelitian.revisian', compact('datas'));
    }

    public function download()
    {

    }

    public function uploadProposalAgain(Request $request, $id)
    {
        $proposal = $request->file('proposal');
        //dd($proposal->getClientOriginalName());
        $name = $proposal->getClientOriginalName();
        $destinationPath = public_path('uploads/user/penelitian');
        $proposal->move($destinationPath, $name);

        $data = P3M::findOrFail($id);
        $data->proposal = $name;
        $data->revisi = '1';
        $data->update();

        return redirect()->route('user.penelitian.revisi')->with('success', 'berhasil upload proposal lagi');
    }

}
