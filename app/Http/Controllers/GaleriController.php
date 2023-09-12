<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Posts;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $menuGaleri = 'active';

        return view('dashboard.galeri.index', compact('menuGaleri', 'galeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menuGaleri = 'active';        
        return view('dashboard.galeri.create', compact('menuGaleri'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|min:5',                
                'image' => 'image|file|mimes:jpeg,png,jpg,max:3072',                
            ]);

            if ($request->file('image')) {
                $validatedData['image'] = $request->file('image')->store('images');
            }

            $validatedData['user_id'] = auth()->user()->id;            

            Galeri::create($validatedData);

            return redirect()->route('galeri.index')->with(['success' => 'created successfully']);
        } catch (Exception $e) {
            return redirect()->route('galeri.index')->with(['failed' => 'Ada kesalahan system. error :' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menuGaleri = 'active';
        $galeri = Galeri::findOrFail($id);
        return view('dashboard.galeri.show', compact('galeri', 'menuGaleri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menuGaleri = 'active';
        $galeri = Galeri::findOrFail($id);
        return view('dashboard.galeri.edit', [
            'galeri' => $galeri,
            'menuGaleri' => $menuGaleri,            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|min:5',                
                'image' => 'image|file|mimes:jpeg,png,jpg,max:3072',                
            ]);

            $galeri = Galeri::findOrFail($id);

            if ($request->file('image')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $validatedData['image'] = $request->file('image')->store('images');
            }

            $validatedData['user_id'] = auth()->user()->id;

            $galeri->update($validatedData);

            return redirect()->route('galeri.index')->with(['success' => 'Update successfully']);
        } catch (Exception $e) {
            return redirect()->route('galeri.index')->with(['failed' => 'Ada kesalahan system. error :' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $galeri = Galeri::findOrFail($id);
        if ($galeri) {
            $galeri->delete();
            return redirect()->back()->with(['success' => 'deleted successfully']);
        } else {
            return redirect()->back()->with(['failed' => 'Ada kesalahan system']);
        }
    }
}
