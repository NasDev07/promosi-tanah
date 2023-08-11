<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function artikel(){
        return view('frontend.blog.blog');
    }

    public function SigleBlog(){
        return view('frontend.blog.sigle');
    }
}
