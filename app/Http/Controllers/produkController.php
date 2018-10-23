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


class produkController extends Controller
{

  public function redir() {
    $view = DB::table('toko')
            ->join('produk', 'produk.toko_id', '=', 'toko.id_toko')
            ->join('users', 'users.id', '=', 'toko.user_id')
            ->select('produk.*')
            ->where('toko.user_id', '=', Auth::user()->id)
            ->get();
    $toko = Toko::where('id_toko','=',$view->first()->toko_id);
    //dd($toko);

    return view('produk.produk', compact('view','toko'));
}

public function tampil(){
  $view = produk::all();
  return view('welcome', compact('view'));
}

public function buat(){
  return view('produk.tambah');
}

public function lihat(Request $request, $id){
  $view = produk::where('slug_produk','=',$id)->first();
  $toko = Toko::where('id_toko','=',$view->toko_id)->first();

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
      'kondisi' => $request->kondisi,
      'slug_produk' => $slug,
      'toko_id' => 0,
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
  //dd($bayar);
  pembayaran::create([
    'jumlah' => $bayar->jumlah,
    'user_id' => $bayar->user_id,
    'idbarang' => $bayar->idbarang,
    'statuspembayaran' => '0',
    'buktitransfer' => ''
  ]);
  $bayar->delete();
  return view('produk.successpembayaran');
}

public function viewpembayaran(){
  $view = DB::table('pembayaran')
          ->join('produk', 'produk.id_produk', '=', 'pembayaran.idbarang')
          ->join('users', 'users.id','=','pembayaran.user_id')
          ->select('pembayaran.*', 'produk.*', 'users.alamat')
          ->where('pembayaran.user_id', '=', Auth::user()->id)
          ->get();
  $total = DB::table('pembayaran')
          ->join('produk', 'produk.id_produk', '=', 'pembayaran.idbarang')
          ->select(DB::raw('SUM(jumlah*harga) as total'))
          ->where('pembayaran.user_id', '=', Auth::user()->id)
          ->first();
  //dd($view, $total);
  return view('produk.pembayaran', compact('view', 'total'));
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

// public function show($slug)
// {
//     $quote = Quote::with('comments.user')->where('slug', $slug)->first();
//
//     if (empty($quote))
//     abort(404);
//
//     return view('quotes.single', compact('quote'));
// }
//
//     public function edit($id)
//     {
//       $quote = Quote::findOrFail($id);
//       return view('quotes.edit', compact('quote'));
//     }
//
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         $quote = Quote::findOrFail($id);
//         if($quote->isOwner())
//           $quote->update([
//             'title' => $request->title,
//             'subject' => $request->subject,
//           ]);
//         else abort(403);
//
//         return redirect('quotes')->with('msg', 'kutipan berhasil diedit');
//     }
//
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//       $quote = Quote::findOrFail($id);
//       if($quote->isOwner())
//         $quote->delete();
//       else abort(403);
//
//       return redirect('quotes')->with('msg', 'kutipan berhasil dihapus');
//     }

}
