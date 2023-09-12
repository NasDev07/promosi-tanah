<?php

namespace App\Http\Controllers;

use App\Models\Kepala;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KepalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kepala = Kepala::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $menuKepala = 'active';

        return view('dashboard.kepala.index', compact('menuKepala', 'kepala'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menuKepala = 'active';        
        return view('dashboard.kepala.create', compact('menuKepala'));
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

            Kepala::create($validatedData);

            return redirect()->route('kepala.index')->with(['success' => 'created successfully']);
        } catch (Exception $e) {
            return redirect()->route('kepala.index')->with(['failed' => 'Ada kesalahan system. error :' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menuKepala = 'active';
        $kepala = Kepala::findOrFail($id);
        return view('dashboard.kepala.show', compact('kepala', 'menuKepala'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menuKepala = 'active';
        $kepala = Kepala::findOrFail($id);
        return view('dashboard.kepala.edit', [
            'kepala' => $kepala,
            'menuKepala' => $menuKepala,            
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

            $kepala = Kepala::findOrFail($id);

            if ($request->file('image')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $validatedData['image'] = $request->file('image')->store('images');
            }

            $validatedData['user_id'] = auth()->user()->id;

            $kepala->update($validatedData);

            return redirect()->route('kepala.index')->with(['success' => 'Update successfully']);
        } catch (Exception $e) {
            return redirect()->route('kepala.index')->with(['failed' => 'Ada kesalahan system. error :' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kepala = Kepala::findOrFail($id);
        if ($kepala) {
            $kepala->delete();
            return redirect()->back()->with(['success' => 'deleted successfully']);
        } else {
            return redirect()->back()->with(['failed' => 'Ada kesalahan system']);
        }
    }
}
