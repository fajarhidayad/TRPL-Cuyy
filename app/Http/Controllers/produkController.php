<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\produk;
use Illuminate\Http\Request;
use App\Models\Toko;
use Illuminate\Support\Facades\DB;
use App\Models\keranjang;
use App\Models\pembayaran;
use Illuminate\Support\Facades\Input;
use App\Models\pembayaran_saldo;


class produkController extends Controller
{

  public function redir() {
    $toko = Toko::where('user_id','=',Auth::User()->id)->first();
    $view = DB::table('produk')
            ->select('produk.*')
            ->where('produk.toko_id', '=', $toko->id_toko)
            ->where('produk.stok', '>', 0)
            ->get();
    $kosong =  DB::table('produk')
            ->select('produk.*')
            ->where('produk.toko_id', '=', $toko->id_toko)
            ->where('produk.stok', '=', 0)
            ->get();
    //dd($toko);
    if(is_null($toko)){
  return redirect('toko-error');
    } else{
    return view('produk.produk', compact('view', 'kosong'));
  }
}

public function tampil(){
  $view = DB::table('produk')->where('stok', '>', 0)->get();
  
  return view('welcome', compact('view'));
}

public function buat(){
  return view('produk.tambah');
}

public function lihat(Request $request, $id){
  $view = produk::where('slug_produk','=',$id)->first();
  $toko = Toko::where('id_toko','=',$view->toko_id)->first();
  // dd($toko);

  return view('produk.lihat', compact('view','toko'));
}

public function ubah(Request $request, $idproduk){
  $view = produk::where('slug_produk','=',$idproduk)->first();
  return view('produk.ubah', compact('view'));
}


public function update(Request $request, $idproduk)
{
    $produk = produk::where('slug_produk','=',$idproduk)->first();
    if($request->foto==''){
      $produk->foto_produk=$produk->foto_produk;
    }
    else{
      $orname = $request->file('foto_produk')->getClientOriginalName();
      $filename = pathinfo($orname, PATHINFO_FILENAME);
      $ext = $request->file('foto_produk')->getClientOriginalExtension();
      $tgl = Carbon::now()->format('dmYHis');
      $newname = $filename . $tgl . "." . $ext;
      $produk->foto_produk=$newname;
      $request->file('fototoko')->move("gambar/", $newname);
    }

    $produk->nama_produk=$request->nama_produk;
    $produk->deskripsi=$request->deskripsi;
    $produk->harga=$request->harga;
    $produk->stok=$request->stok;
    $produk->berat=$request->berat;
    $produk->kondisi_barang=$request->kondisi;
    $produk->slug_produk=$produk->slug_produk;
    $produk->save();

    $view = produk::where('slug_produk','=',$idproduk)->first();
    $toko = Toko::where('id_toko','=',$view->toko_id)->first();
    return view('produk.lihat', compact('view','toko'));
}


public function store(Request $request)
{
    // $this->validate($request, [
    //   'nama_produk' => 'required|min:3',
    //   'harga' => 'required|min:5',
    //   'stok' => 'required|min:1',
    //   'deskripsi' => 'required|min:5',
    // ]);


$detail = toko::where('user_id','=',Auth::User()->id)->first();
    
    $this->validate($request, [
        'foto' => 'mimes:jpeg,bmp,png', 
    ]);

    $slug = $request->nama_produk . '-' .time();
    //dd($request);
    $fileName   = $request->file('foto')->getClientOriginalName();
    $request->file('foto')->move("gambar/", $fileName);
    $produk = produk::create([
      'foto_produk' => $fileName,
      'nama_produk' => $request ->nama_produk,
      'deskripsi' => $request ->deskripsi,
      'harga' => $request ->harga,
      'stok' => $request ->stok,
      'berat' => $request ->berat,
      'kategori' => $request->kategori,
      'kondisi' => $request->kondisi,
      'slug_produk' => $slug,
      'toko_id' => $detail->id_toko,
      'user_id' => Auth::user()->id
    ]);

    $view = produk::all();

    return view('produk.produk', compact('view'));
}

public function buatToko(){
  return view('toko.buat');
}

public function masukkeranjang(Request $request, $id){
  keranjang::create([
    'jumlah' => $request->jumlahbarang,
    'user_id' => Auth::User()->id,
    'idbarang' => $id
  ]);

  $minstok = produk::find($id);
  $minstok->stok = $minstok->stok - $request->jumlahbarang;
  $minstok->save();

  return redirect('keranjang');
}

public function masukbayar(Request $request, $id){
  $bayar = keranjang::find($id);
  $alamat = User::where('id', '=', Auth::User()->id)->first();
  pembayaran::create([
    'jumlah' => $bayar->jumlah,
    'user_id' => $bayar->user_id,
    'idbarang' => $bayar->idbarang,
    'statuspembayaran' => '0',
    'buktitransfer' => '',
    'alamat' => $alamat->alamat.', '.$alamat->kelurahan.', '.$alamat->kecamatan.', '.$alamat->kabupaten.', '.$alamat->provinsi
  ]);
  $bayar->delete();
  return view('produk.successpembayaran');
}

public function viewpembayaran(){
  if(Auth::User()->level==2){
  $view = DB::table('pembayaran')
          ->join('produk', 'produk.id_produk', '=', 'pembayaran.idbarang')
          ->join('users', 'users.id','=','pembayaran.user_id')
          ->select('pembayaran.*', 'produk.*', 'users.*')
          ->where('pembayaran.user_id', '=', Auth::user()->id)
          ->get();
  $total = DB::table('pembayaran')
          ->join('produk', 'produk.id_produk', '=', 'pembayaran.idbarang')
          ->select(DB::raw('SUM(jumlah*harga) as total'))
          ->where('pembayaran.user_id', '=', Auth::user()->id)
          ->first();
  $jumlah = pembayaran::where([['user_id', '=', Auth::user()->id], ['statuspembayaran', '=', 0]])->count();
  $jumlahsaldo = pembayaran_saldo::where([['user_id', '=', Auth::user()->id], ['status', '=', 0]])->count();
  $pembayaran = pembayaran_saldo::where('user_id', '=', Auth::user()->id)->get();
  //dd($view, $total);
  return view('produk.pembayaran', compact('view', 'total', 'pembayaran', 'jumlah', 'jumlahsaldo'));
}
else if(Auth::User()->level==1){
$view = DB::table('pembayaran')
        ->join('produk', 'produk.id_produk', '=', 'pembayaran.idbarang')
        ->join('users', 'users.id','=','pembayaran.user_id')
        ->select('pembayaran.*', 'produk.*', 'users.*')
        ->get();
$total = DB::table('pembayaran')
        ->join('produk', 'produk.id_produk', '=', 'pembayaran.idbarang')
        ->select(DB::raw('SUM(jumlah*harga) as total'))
        ->first();
//dd($view, $total);
return view('produk.pembayaran', compact('view', 'total'));
}
}

public function hapusKeranjang($id){
  $view = keranjang::find($id);
  $produk = produk::find($view->idbarang);
  $produk->stok = $produk->stok + $view->jumlah;
  $produk->save;
  $view->delete();
  return redirect('keranjang');
}

public function checkproduk($id){

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

  return view('produk.checkout',compact('check','total'));
}

public function lihatkeranjang(){
  $view = DB::table('keranjang')
          ->join('produk', 'produk.id_produk', '=', 'keranjang.idbarang')
          ->join('users', 'users.id','=','keranjang.user_id')
          ->select('keranjang.*', 'produk.*', 'users.alamat')
          ->where('keranjang.user_id', '=', Auth::user()->id)
          ->get();
          $total = DB::table('keranjang')
                  ->join('produk', 'produk.id_produk', '=', 'keranjang.idbarang')
                  ->select(DB::raw('SUM(jumlah*harga) as total'))
                  ->where('keranjang.user_id', '=', Auth::user()->id)
                  ->first();
  return view('produk.keranjang', compact('view','total'));
}

public function buktipembayaran(Request $request, $id){
  $transfer = pembayaran::where('idpembayaran','=',$id)->first();
    // dd(Input::file('buktipembayaran')->getClientOriginalName());
  $fileName = $request->file('buktipembayaran')->getClientOriginalName();
  $request->file('buktipembayaran')->move("buktitransfer/", $fileName);
  $transfer->buktitransfer = $fileName;
  $transfer->statuspembayaran = 2;
  $transfer->save();
  return redirect('/pembayaran');
}

public function uploadbukti(Request $request, $id){
  $transfer = pembayaran_saldo::where('id_pembayaran','=', $id)->first();
  $fileName = $request->file('buktisaldo')->getClientOriginalName();
  $request->file('buktisaldo')->move("buktitransfer/", $fileName);
  $transfer->bukti = $fileName;
  $transfer->status = 1;
  // dd($transfer);
  $transfer->save();
  return redirect('/pembayaran');
}

public function pengaturan(){
  return view('toko.pengaturan');
}

public function penjualan(){
  $users = User::where(Auth::user()->first());
  $toko = DB::table('pembayaran')
                ->join('produk', 'produk.id_produk', '=', 'pembayaran.idbarang')
                ->join('users', 'users.id', '=', 'pembayaran.user_id')
                ->join('toko', 'toko.id_toko', '=', 'produk.toko_id')
                ->where('pembayaran.statuspembayaran', '=', 1)
                ->where('toko.user_id', '=', Auth::user()->id)
                ->get();
                // dd($toko);
  return view('produk.penjualan', compact('toko'));
}

}
