<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Exception;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {             
        return view('frontend.message.index');        
    }

     public function create()
    {        
        return view('frontend.message.index');        
    }

    public function store(Request $request)
    {
        // try {
            $validatedData = $request->validate([
                'name' => 'required|min:2',                                
                'email' => 'required|min:2',                                
                'nomor_hp' => 'required|min:2',                                
                'message' => 'required|min:2',                                
            ]);            

            Pesan::create($validatedData);
            return redirect()->back()->with(['success' => 'Pesan Anda telah dikirim. Terima kasih!😊']);

        //     return redirect()->route('pesan.index')->with(['success' => 'created successfully']);
        // } catch (Exception $e) {
        //     return redirect()->route('pesan.index')->with(['failed' => 'ada kesalahan sistem']);
        // }
    }
}
