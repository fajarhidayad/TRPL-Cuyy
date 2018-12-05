<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\saldo;
use App\Models\gruplelang;
use App\Models\lelang;
use App\Models\anggotalelang;
use Illuminate\Support\Facades\DB;

class lelangController extends Controller
{
	public function lelangsetuju(){
		$lelang = lelang::where('status', '=', 'Dibuka')->first();
		return view('lelang.syarat', compact('lelang'));
	}

	public function masuklelang(){
		$lelang = lelang::where('status', '=', 'Dibuka')->first();
		$jumlah = DB::table('gruplelang')->where('iduser', '=', 0)->count();
		$isi = gruplelang::where('nama_produk', '!=', '')->get();
		$grup = gruplelang::where('idlelang', '=', $lelang->id_lelang);
		return view('lelang.gruplelang', compact('grup', 'jumlah', 'isi'));
	}

	public function tambahproduk(){
		return view('lelang.tambahproduk');
	}

	public function updateproduk(Request $request){
		$tambah = gruplelang::where('iduser', '=', 0)->first();

		$tambah->nama_produk = $request->nama_produk;
		$tambah->deskripsi = $request->deskripsi;
		$tambah->harga_awal = $request->harga_awal;
		$fileName = $request->file('buktisaldo')->getClientOriginalName();
		$request->file('foto')->move("gambar/", $fileName);
		$tambah->foto_produk = $fileName;
		$tambah->iduser = Auth::user()->id;
		$tambah->setuju = 1;
		$tambah->save();
		for ($i=0; $i < 5; $i++) { 
			$anggota = anggotalelang::create(['nama_anggota' => "",
				'harga' => 0,
				'id_user' => 0,
				'id_grup' => $tambah->idgrup,
			]);
		}
		return redirect('event/lelang/masuk')->with('message', 'Berhasil Ditambahkan');
	}

}
