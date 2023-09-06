<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Struktur;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
        return view('frontend.profil-kepala.profile-kepala');
    }
    
}
