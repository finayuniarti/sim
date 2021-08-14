<?php

namespace App\Http\Controllers\User;

use App\Anggota;
use App\Mail\MailNotify;
use App\P3M;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Notifikasi;
use App\Events\PenelitianEvent;

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
        $rules = [
            'judul' => 'required',
            'proposal' => 'required|mimetypes:application/pdf, application/x-pdf,application/acrobat, applications/vnd.pdf, text/pdf, text/x-pdf|max:5120|file',
            'nominal' => 'required|numeric',
        ];

        $message = [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => ':atttribute hanya boleh angka',
            'mimes' => ':attribute hanya boleh pdf',
            'regex' => ':attribute hanya boleh huruf dan spasi'
        ];

        $this->validate($request, $rules, $message);

        //        $validator = Validator::make($request->all(), $rules);
        //        if ($validator->fails()) {
        //            return redirect()->back()->withErrors($validator);
        //        }

        $proposal = $request->file('proposal');
        //dd($proposal->getClientOriginalName());
        $name = date('ymdHis') . "-" . $proposal->getClientOriginalName();
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
                'id_anggota' => $anggota,
                // 'notifikasi' => 'anda telah ditambahkan ke penelitian ' . Auth::guard('web')->user()->name
            ];

            $this->notifkasi($anggota,'penelitian',$data);
        }

       DB::table('anggotas')->insert($item);
        // Mail::to("yuniafina4@gmail.com")->send(new MailNotify());
        return redirect()->route('user.home.index');
    }

    public function notifkasi($anggota,$tipe,$data)
    {
      Notifikasi::create([
        'pesan' => 'Anda telah ditambahkan penelitian oleh '.Auth::guard('web')->user()->name.' dengan judul '.$data->judul,
        'id_user' => $anggota,
        'tipe' => $tipe,
      ]);

      event(new PenelitianEvent('success',$anggota));
      return true;
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
