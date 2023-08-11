<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHomeConterller extends Controller
{
    public function blog() {
        return view('frontend.blog');
    }
}
