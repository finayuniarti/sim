<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifikasi;
use Auth;
class NotifikasiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $notifikasis = Notifikasi::where('id_user', Auth::user()->id)->orderBy('created_at','DESC')->take(5)->get();
        // return view('pages.user.penelitian.notify', compact('notifikasis'));
        return response()->json([
          'data' => $notifikasis
        ]);
    }

    public function update($id){
      $notikasi = Notifikasi::find($id);
      $notikasi->status = false;
      $notikasi->update();
      return response()->json([
        'status' => true
      ]);
    }
}
