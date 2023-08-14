<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\Produk;
use Illuminate\Http\Request;

class UserProdukController extends Controller
{
    public function promosi(Request $request) {
        $keyword = $request->input('keyword');

        $dataPost = Produk::latest()
        ->where('title', 'LIKE', '%' . $keyword . '%')
        ->orWhere('body', 'LIKE', '%' . $keyword . '%')
        ->paginate(9);

        return view("frontend.produk.index", compact('dataPost'));
    }

    public function show($title)
    {
        $produkShow = Produk::where('title', $title)->firstOrFail();
        $produkSlider = Produk::latest()
        ->paginate(8);
        return view('frontend.produk.detail-produk', compact('produkShow', 'produkSlider'));
    }
    
    
}
