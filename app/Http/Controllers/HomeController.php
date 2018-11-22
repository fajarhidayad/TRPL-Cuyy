<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function cari(Request $request){
      $search_q = urlencode($request->input('search'));
      
      if (!empty($search_q))
        $view = DB::table('produk')->where('nama_produk', 'like', '%'.$search_q.'%')->where('stok', '>', 0)->get();
      else
        $view = DB::table('produk')->where('stok', '>', 0)->get();
      return view('cari', compact('view'));
    }

    public function profile($id = null){
      if ($id==null) {
        $user = User::findOrFail(Auth::user()->id);
      }else {
        $user = User::findOrFail($id);
      }

      return view('profile', compact('user'));
    }

    public function admin(){
      if (Auth::user()->level == 1) {
        return view('admin.homeadmin');
      }else{
        return redirect('/');
      }
      
    }

    public function filter($kategori)
    {
      $view = DB::table('produk')->where('kategori', '=', $kategori)->where('stok', '>', 0)->get();
      return view('cari', compact('view'));
    }

    public function lihat(Request $request)
    {
      $user = User::where('id','=',Auth::User()->id)->first();
      if ($user->level==1) {
       return redirect('admin');
      }else{
        return view('profile', compact('user'));
      }
      
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

      $fileName   = $request->foto;
    $request->file('foto')->move("fotoprofil/", $fileName);

      $profil->foto = $request->foto;
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

    public function alamat(Request $request, $id){
     $check = DB::table('keranjang')
          ->join('produk', 'produk.id_produk', '=', 'keranjang.idbarang')
          ->join('users', 'users.id','=','keranjang.user_id')
          ->select('keranjang.*', 'produk.*', 'users.alamat')
          ->where('keranjang.user_id', '=', Auth::user()->id)
          ->where('keranjang.idkeranjang','=',$id)
          ->first();

          $total = DB::table('keranjang')
                  ->join('produk', 'produk.id_produk', '=', 'keranjang.idbarang')
                  ->select(DB::raw('jumlah*harga as total'))  
                  ->where('keranjang.user_id', '=', Auth::user()->id)
                  ->where('keranjang.idkeranjang','=',$id)
                  ->first();

      $alamat = User::where('id', '=', Auth::user()->id)->first();
      // $alamat->alamat = $request->alamat;
      // $alamat->kelurahan = $request->kelurahan;
      // $alamat->kecamatan = $request->kecamatan;
      // $alamat->kabupaten = $request->kabupaten;
      // $alamat->provinsi = $request->provinsi;
      return view('produk.alamatPembayaran', compact('check', 'total','alamat'));
    }

    public function checkout(Request $request, $id){
     $check = DB::table('keranjang')
          ->join('produk', 'produk.id_produk', '=', 'keranjang.idbarang')
          ->join('users', 'users.id','=','keranjang.user_id')
          ->select('keranjang.*', 'produk.*', 'users.alamat')
          ->where('keranjang.user_id', '=', Auth::user()->id)
          ->where('keranjang.idkeranjang','=',$id)
          ->first();

          $total = DB::table('keranjang')
                  ->join('produk', 'produk.id_produk', '=', 'keranjang.idbarang')
                  ->select(DB::raw('jumlah*harga as total'))  
                  ->where('keranjang.user_id', '=', Auth::user()->id)
                  ->where('keranjang.idkeranjang','=',$id)
                  ->first();

      $alamat = User::where('id', '=', Auth::user()->id)->first();
      $alamat->alamat = $request->alamat;
      $alamat->kelurahan = $request->kelurahan;
      $alamat->kecamatan = $request->kecamatan;
      $alamat->kabupaten = $request->kabupaten;
      $alamat->provinsi = $request->provinsi;
      $alamat->save();

      return view('produk.checkout', compact('check', 'total','alamat'));
    }

}
