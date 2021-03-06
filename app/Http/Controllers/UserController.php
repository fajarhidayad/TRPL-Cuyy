<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\saldo;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Toko;
use App\Models\pembayaran_saldo;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request){
  $profil = User::where('id', '=',Auth::User()->id)->first();
  // dd(Input::file('fotoprofil'));
  if ($request->fotoprofil != "") {
    $fileName   = $request->file('fotoprofil')->getClientOriginalName();
    $request->file('fotoprofil')->move("fotoprofil/", $fileName);
    $profil->foto = $fileName;
  }

  $profil->name = $request->name;
  $profil->email = $request->email;
  $profil->jenis_kelamin = $request->jenis_kelamin;
  $profil->alamat = $request->alamat;
  $profil->kelurahan = '';
  $profil->kecamatan = '';
  $profil->kabupaten = '';
  $profil->provinsi = '';
  $profil->tanggal_lahir = $request->tanggal_lahir;
  $profil->telepon = $request->telepon;
  $profil->sosmed = $request->sosmed;
  $profil->kartu_kredit = $request->kartu_kredit;
  $profil->save();

  $saldo = saldo::where('iduser', '=', Auth::User()->id)->first();
  $user = User::where('id','=', Auth::User()->id)->first();
  return view('profile', compact('user', 'saldo', 'profil'));
}
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
