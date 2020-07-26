<?php

namespace App\Http\Controllers\Admin;

use App\Imports\CsvImport;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class AkunDosenController extends Controller
{
    public function index(){
        $datas = User::all();
        return view('pages.admin.akun.dosen.index', compact('datas'));
    }

    public function import(Request $request){
        $this->validate($request,[
            'file' => 'required'
        ]);
        Excel::import(new CsvImport, \request()->file('file'));
        return redirect()->route('admin.dosen.index');
    }
    public function create()
    {
        return view('pages.admin.akun.dosen.create');
    }
    public function store(Request $request)
    {
        $data= new User();
        $data->name = $request->nama;
        $data->prodi = $request->prodi;
        $data->email = $request->email;
        $data->nidn = $request->nidn;
        $data->password = Hash::make($request->nidn);
        $data->save();
        return redirect()->route('admin.dosen.index');
    }
    public function edit($id)
    {
        $data = User::find($id);
        return view('pages.admin.akun.dosen.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);

        $validator = Validator::make($request->all(), [
            'email' => 'email|unique:users,email,'.$data->id
        ]);

        if ($validator->fails()) {
            return response()->json([
                $validator->errors(),
            ]);
        }

        $data->name = $request->nama;
        $data->email =$request->email;
        $data->nidn =$request->nidn;
        $data->prodi =$request->prodi;
        if ($request->password != null){
            $data->password= Hash::make($request->password);
        }
        $data->save();
        return redirect()->route('admin.dosen.index')->with('success', 'Berhasil mengupdate data dosen');

    }

    public function destroy($id)
    {
        $data = User::findOrfail($id);
        $data->delete();

        return redirect()->route('admin.dosen.index')->with('success', 'Berhasil menghapus data');

    }
}
