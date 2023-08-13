<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function artikel(){
        $post = Posts::all();
        return view('frontend.blog.blog', compact('post'));
    }

    public function SigleBlog(){
        return view('frontend.blog.sigle');
    }

    public function contact(){
        return view('frontend.contact.index');
    }
}
