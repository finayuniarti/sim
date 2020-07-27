<?php

namespace App\Http\Controllers\Admin;

use App\KaP3M;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AkunKap3mController extends Controller
{
    public function index()
    {
        $datas =KaP3M::all();
        return view('pages.admin.akun.kap3m.index', compact('datas'));
    }

    public function create()
    {
        return view('pages.admin.akun.kap3m.create');
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $data= new KaP3M();
        $data->nidn = $request->nidn;
        $data->prodi = $request->prodi;
        $data->name = $request->nama;
        $data->email = $request->email;
        $data->password = Hash::make($request->nidn);
        $data->save();
        return redirect()->route('admin.kap3m.index');
    }
    public function edit($id)
    {
        $data = KaP3M::find($id);
        return view('pages.admin.akun.kap3m.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = KaP3M::find($id);

        $validator = Validator::make($request->all(), [
            'email' => 'email|unique:ka_p3_m_s,email,'.$data->id
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
        return redirect()->route('admin.kap3m.index')->with('success', 'Berhasil');
    }

    public function destroy($id)
    {
        $data = KaP3M::findOrfail($id);
        $data->delete();

        return redirect()->route('admin.kap3m.index')->with('success', 'Berhasil');
    }
}
