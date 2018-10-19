<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\User;

class tokoController extends Controller
{
  public function store(Request $request)
  {
      $this->validate($request, [
        'toko' => 'required|min:3',
        'alamat' => 'required|min:5',
        'telpon' => 'required|min:5',
        'alamat' => 'required|min:5',
        'deskripsi' => 'required|min:5',
      ]);
      //
      // $slug = str_slug($request->title, '-');
      //
      // if (Quote::where('slug', $slug)->first() != null) {
      //   $slug = $slug . '-' .time();
      // }

      $toko = Quote::create([
        'title' => $request ->title,
        'slug' => $slug,
        'subject' => $request ->subject,
        'user_id' => Auth::user()->id
      ]);
      return redirect('quotes')->with('msg', 'kutipan berhasil disubmit');
  }
}
