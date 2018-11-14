<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Models\Toko;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function profile($id = null){
      if ($id==null) {
        $user = User::findOrFail(Auth::user()->id);
      }else {
        $user = User::findOrFail($id);
      }

      return view('profile', compact('user'));
    }

    public function lihat(Request $request)
    {
      $user = User::where('id','=',Auth::User()->id)->first();
      return view('profile', compact('user'));
    }

    public function jual()
    {
      $cektoko = Toko::where('user_id','=',Auth::User()->id)->first();
      if (is_null($cektoko)) {
        return redirect('toko-error');
      }
      else{
      return view('user.profile');
    }
    }

    public function ubah(Request $request)
    {
      $view = User::where('id','=',Auth::User()->id)->first();
      return view('user.ubah', compact('view'));
    }

    public function update(Request $request){
      $profil = User::where('id', '=',Auth::User()->id)->first();

      $profil->name = $request->name;
      $profil->email = $request->email;
      $profil->jenis_kelamin = $request->jenis_kelamin;
      $profil->alamat = $request->alamat;
      $profil->tanggal_lahir = $request->tanggal_lahir;
      $profil->telepon = $request->telepon;
      $profil->sosmed = $request->sosmed;
      $profil->kartu_kredit = $request->kartu_kredit;
      $profil->save();
      
      $user = User::where('id','=',Auth::User()->id)->first();
      return view('profile', compact('user'));
    }

    public function error()
    {
        return view('toko.belum');
    }

}
