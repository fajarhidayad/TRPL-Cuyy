<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use Illuminate\Support\Facades\DB;
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

  public function profilToko(Request $request){
    $view = Toko::where('user_id','=',Auth::User()->id)->first();
    // $idtoko = $view->id_toko;
    $produk = DB::table('produk')
            ->select('produk.*')
            ->where('produk.toko_id', '=', $view->id_toko)
            ->get();
    return view('toko.pengaturan', compact('view', 'produk'));
  }

  public function ubahToko(){
    $toko = Toko::where('user_id', '=', Auth::user()->id)->first();
    return view('toko.ubah', compact('toko'));
  }

  public function ubah(Request $request){
    $this->validate($request, [
        'toko' => 'required|min:3',
        'alamat' => 'required|min:5',
        'telepon' => 'required|min:5',
        'deskripsi' => 'required|min:5',
        'fototoko' => 'required|mimes:jpeg,bmp,png',
      ]);

    $orname = $request->file('fototoko')->getClientOriginalName();
      $filename = pathinfo($orname, PATHINFO_FILENAME);
      $ext = $request->file('fototoko')->getClientOriginalExtension();

      $toko = Toko::where('user_id', '=', Auth::user()->id)->first();
      $toko->nama_toko = $request->toko;
      $toko->alamat_toko = $request->alamat;
      $toko->telepon = $request->telepon;
      $toko->deskripsi = $request->deskripsi;
      $toko->foto_toko = $filename.".".$ext;
      $toko->save();
      return redirect('pengaturan-toko');
  }

  public function kunjungiToko(Request $request, $nama_toko){
    $view = Toko::where('nama_toko','=', $nama_toko)->first();
    // $idtoko = $view->id_toko;
    $produk = DB::table('produk')
            ->select('produk.*')
            ->where('produk.toko_id', '=', $view->id_toko)
            ->get();
    return view('toko.pengaturan', compact('view', 'produk'));
  }
}
