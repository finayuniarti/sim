<?php

namespace App\Http\Controllers\Admin;

use App\Imports\CsvImport;
use App\Imports\ReviewerImport;
use App\Reviewer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AkunReviewerController extends Controller
{
    public function index(){
        $datas = Reviewer::all();
        return view('pages.admin.akun.reviewer.index', compact('datas'));
    }
    public function import(Request $request){
        $this->validate($request,[
            'file' => 'required'
        ]);
        Excel::import(new ReviewerImport(), \request()->file('file'));
        return redirect()->route('admin.reviewer.index');
    }

    public function create()
    {
        return view('pages.admin.akun.reviewer.create');
    }
    public function store(Request $request)
    {
        $data= new Reviewer();
        $data->name = $request->nama;
        $data->bidang_penelitian = $request->bidang_penelitian;
        $data->email = $request->email;
        $data->nidn = $request->nidn;
        $data->password = Hash::make($request->nidn);
        $data->save();
        return redirect()->route('admin.reviewer.index')->with('success', 'Berhasil menambahkan data dosen');
    }

    public function edit($id)
    {
        $data = Reviewer::find($id);
        return view('pages.admin.akun.reviewer.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Reviewer::find($id);

        $validator = Validator::make($request->all(), [
            'email' => 'email|unique:reviewers,email,'.$data->id
        ]);

        if ($validator->fails()) {
            return response()->json([
                $validator->errors(),
            ]);
        }

        $data->name = $request->nama;
        $data->email =$request->email;
        $data->nidn =$request->nidn;
        $data->bidang_penelitian =$request->bidang_penelitian;
        if ($request->password != null){
            $data->password= Hash::make($request->password);
        }
        $data->save();
        return redirect()->route('admin.reviewer.index')->with('success', 'Berhasil mengupdate data dosen');

    }

    public function destroy($id)
    {
        $data = Reviewer::findOrfail($id);
        $data->delete();

        return redirect()->route('admin.reviewer.index')->with('success', 'Berhasil menghapus data');
    }
}
