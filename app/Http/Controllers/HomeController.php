<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kepala;
use App\Models\Posts;
use App\Models\Produk;
use App\Models\Struktur;
use App\Models\User;
use App\Models\VisiMisi;
use App\Models\visitor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request) {
        // Hitung pengunjung
        $visitor = visitor::create([
            'ip_address' => $request->ip()
        ]);
        $visitorCount = Visitor::count();

        // jumlah User
        $userCount = User::count();

        // data produk tanah
        $produkTanah = Produk::latest()->paginate(3);

        // data berita
        $berita = Posts::latest()->paginate(4);

        // data galeri
        $galeri = Galeri::latest()->paginate(6);

        return view('home', compact('visitorCount', 'userCount', 'produkTanah', 'berita', 'galeri'));
    }
    public function artikel(Request $request)
    {
        $keyword = $request->input('keyword');

        $post = Posts::latest()
            ->where('title', 'LIKE', '%' . $keyword . '%')
            ->orWhere('body', 'LIKE', '%' . $keyword . '%')
            ->paginate(5);

        $postSlider = Posts::latest()
            ->paginate(8);
        return view('frontend.blog.blog', compact('post', 'postSlider'));
    }

    public function show($title)
    {
        $postShow = Posts::where('title', $title)->firstOrFail();
        $postSlider = Posts::latest()
        ->paginate(8);
        return view('frontend.blog.sigle', compact('postShow', 'postSlider'));
    }       

    public function visimisi() {
        $visimisi = VisiMisi::all();
        return view('frontend.visi-misi.visi-misi', compact('visimisi'));
    }

    public function StrukturOrganisasi() { 
        $struktur = Struktur::all();
        return view('frontend.struktur.struktur', compact('struktur'));
    }

    public function ProfileKepala(){
        $kepala = Kepala::all();
        return view('frontend.profil-kepala.profile-kepala', compact('kepala'));
    }

    public function PageGaleri() {
        $galery = Galeri::latest()->paginate(9);
        return view('frontend.galeri.galeri', compact('galery'));
    }
    
}
