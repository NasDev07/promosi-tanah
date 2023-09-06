<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $struktur = Struktur::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $menuStruktur = 'active';

        return view('dashboard.struktur.index', compact('menuStruktur', 'struktur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menuStruktur = 'active';        
        return view('dashboard.struktur.create', compact('menuStruktur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([                
                'image' => 'image|file|mimes:jpeg,png,jpg,max:3072',                
            ]);

            if ($request->file('image')) {
                $validatedData['image'] = $request->file('image')->store('images');
            }

            $validatedData['user_id'] = auth()->user()->id;            

            Struktur::create($validatedData);

            return redirect()->route('struktur.index')->with(['success' => 'created successfully']);
        } catch (Exception $e) {
            return redirect()->route('struktur.index')->with(['failed' => 'Ada kesalahan system. error :' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menuStruktur = 'active';
        $struktur = Struktur::findOrFail($id);
        return view('dashboard.struktur.show', compact('post', 'menuStruktur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menuStruktur = 'active';
        $struktur = Struktur::findOrFail($id);
        return view('dashboard.struktur.edit', [
            'struktur' => $struktur,
            'menuStruktur' => $menuStruktur,            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([                
                'image' => 'image|file|mimes:jpeg,png,jpg,max:3072',                
            ]);

            $struktur = Struktur::findOrFail($id);

            if ($request->file('image')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $validatedData['image'] = $request->file('image')->store('images');
            }

            $validatedData['user_id'] = auth()->user()->id;            

            $struktur->update($validatedData);

            return redirect()->route('struktur.index')->with(['success' => 'Update successfully']);
        } catch (Exception $e) {
            return redirect()->route('struktur.index')->with(['failed' => 'Ada kesalahan system. error :' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $struktur = Struktur::findOrFail($id);
        if ($struktur) {
            $struktur->delete();
            return redirect()->back()->with(['success' => 'deleted successfully']);
        } else {
            return redirect()->back()->with(['failed' => 'Ada kesalahan system']);
        }
    }
}
