<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use App\Models\pembayaran;
use App\Models\saldo;
use App\Models\pembayaran_saldo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function pengguna(){
    	$users = DB::table('users')->paginate(10);
    	
    	return view('admin.listpengguna', ['users'=>$users]);
    }

    public function lelang(){
    	return view('lelang.lelang');
    }

    public function verifikasi(){
    	return view('admin.verifikasiHome');
    }

    public function daftarPembayaran(){
    	$verif = DB::table('pembayaran')->where('statuspembayaran', '2')->first();
    	$users = DB::table('pembayaran')
    			->join('users', 'users.id','=','pembayaran.user_id')
    			->join('produk', 'produk.id_produk', '=', 'pembayaran.idbarang')
    			->select('pembayaran.*','users.name', 'produk.*' )
    			->where('pembayaran.statuspembayaran','=','2')
    			->get();
        $userverif = DB::table('pembayaran')
                ->join('users', 'users.id','=','pembayaran.user_id')
                ->join('produk', 'produk.id_produk', '=', 'pembayaran.idbarang')
                ->select('pembayaran.*','users.name', 'produk.*' )
                ->where('pembayaran.statuspembayaran','=','1')
                ->get();
        $user0 = DB::table('pembayaran')
                ->join('users', 'users.id','=','pembayaran.user_id')
                ->join('produk', 'produk.id_produk', '=', 'pembayaran.idbarang')
                ->select('pembayaran.*','users.name', 'produk.*' )
                ->where('pembayaran.statuspembayaran','=','0')
                ->get();
    	$total = DB::table('pembayaran')
          ->join('produk', 'produk.id_produk', '=', 'pembayaran.idbarang')
          ->select(DB::raw('SUM(jumlah*harga) as total'))
          ->get();
    	return view('admin.daftarPembayaran', compact('users','total','userverif', 'user0'));
    }

    public function verifPesanan(Request $request, $id){
        $verif = pembayaran::where('idpembayaran', '=', $id)->first();
        $verif->statuspembayaran = 1;
        $verif->save();
        return redirect('admin/verifikasi/daftar-pembayaran');
    }

    public function batalkanPesanan($id){
        $batal = pembayaran::where('idpembayaran', '=', $id)->first();
        $batal->buktitransfer = "";
        $batal->statuspembayaran = 4;
        $batal->save();
        return redirect('admin/verifikasi/daftar-pembayaran');
}

    public function saldo(){
        $pembayaran = DB::table('pembayaran_saldo')
                        ->join('users', 'pembayaran_saldo.user_id','=', 'users.id' )
                        ->where('pembayaran_saldo.bukti', '!=', '')
                        ->select('users.name', 'pembayaran_saldo.*')
                        ->get();

            return view('admin.saldo', compact('pembayaran'));
        
    }

    public function verifikasisaldo($id){
        $verif = pembayaran_saldo::find($id);
        $saldo = saldo::where('idsaldo', '=', $id)->first();
        $saldo->saldo += $verif->jumlah;
        $saldo->save();
        $verif->delete();
        return redirect('admin/saldo');
    }

    public function batalkansaldo($id){
        $verif = pembayaran_saldo::find($id);
        $verif->delete();
        return redirect('admin/saldo');
    }

    public function tambahlelang(){
        return view('lelang.tambahlelang');
    }
}
