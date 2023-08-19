<?php

namespace App\Http\Controllers;

use App\Models\Accon;
use App\Models\Pesan;
use App\Models\Produk;
use Exception;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        $product = Produk::all();
        $akun = Accon::all();
        return view('frontend.message.index', compact('product', 'akun'));
    }

    public function create($id)
    {   
        $product = Produk::findOrFail($id);
        return view('frontend.message.index', compact('product'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|min:2',
            'nomor_hp' => 'required|min:2',
            'message' => 'required|min:2',                        
            'pilihan' => 'required|min:2',                        
        ]);
        

        Pesan::create($validatedData);
        return redirect()->back()->with(['success' => 'Pesan Anda telah dikirim. Terima kasih!😊']);
    }

    // public function store(Request $request)
    // {        
    //         $validatedData = $request->validate([
    //             'name' => 'required|min:2',                                
    //             'email' => 'required|min:2',                                
    //             'nomor_hp' => 'required|min:2',                                
    //             'message' => 'required|min:2',                                
    //         ]);                

    //         Pesan::create($validatedData);
    //         return redirect()->back()->with(['success' => 'Pesan Anda telah dikirim. Terima kasih!😊']);        
    // }
    
}
