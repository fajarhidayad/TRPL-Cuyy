<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\User;
use Carbon\Carbon;
use Auth;

class tokoController extends Controller
{
  public function store(Request $request)
  {
      $this->validate($request, [
        'toko' => 'required|min:3',
        'alamat' => 'required|min:5',
        'telepon' => 'required|min:5',
        'deskripsi' => 'required|min:5',
        'fototoko' => 'required|mimes:jpeg,bmp,png',
      ]);
      //
      // $slug = str_slug($request->title, '-');
      //
      // if (Quote::where('slug', $slug)->first() != null) {
      //   $slug = $slug . '-' .time();
      // }

      $orname = $request->file('fototoko')->getClientOriginalName();
      $filename = pathinfo($orname, PATHINFO_FILENAME);
      $ext = $request->file('fototoko')->getClientOriginalExtension();
      $tgl = Carbon::now()->format('dmYHis');
      $newname = $filename . $tgl . "." . $ext;

      $toko = ([
        'nama_toko' => $request ->toko,
        'alamat_toko' => $request->alamat,
        'telepon' => $request ->telepon,
        'deskripsi' => $request->deskripsi,
        'foto_toko' => $newname,
        'user_id' => Auth::user()->id,
      ]);
      // dd($toko);
      $request->file('fototoko')->move("fototoko/", $newname);
      Toko::create($toko);
      return redirect('profile');
  }
}
