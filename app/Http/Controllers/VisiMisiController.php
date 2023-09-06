<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Exception;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visimisi = VisiMisi::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $menuVisiMisi = 'active';

        return view('dashboard.visi-misi.index', compact('menuVisiMisi', 'visimisi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menuVisiMisi = 'active';        
        return view('dashboard.visi-misi.create', compact('menuVisiMisi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([                
                'body' => 'required|min:3',
            ]);

            $validatedData['user_id'] = auth()->user()->id;            

            VisiMisi::create($validatedData);

            return redirect()->route('visi-misi.index')->with(['success' => 'created successfully']);
        } catch (Exception $e) {
            return redirect()->route('visi-misi.index')->with(['failed' => 'Ada kesalahan system. error :' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menuVisiMisi = 'active';
        $visimisi = VisiMisi::findOrFail($id);
        return view('dashboard.visi-misi.show', compact('visimisi', 'menuVisiMisi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menuVisiMisi = 'active';
        $visimisi = VisiMisi::findOrFail($id);
        return view('dashboard.visi-misi.edit', [
            'visimisi' => $visimisi,
            'menuVisiMisi' => $menuVisiMisi,            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([                
                'body' => 'required|min:3',
            ]);

            $visimisi = VisiMisi::findOrFail($id);            

            $validatedData['user_id'] = auth()->user()->id;

            $visimisi->update($validatedData);

            return redirect()->route('visi-misi.index')->with(['success' => 'Update successfully']);
        } catch (Exception $e) {
            return redirect()->route('visi-misi.index')->with(['failed' => 'Ada kesalahan system. error :' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $visimisi = VisiMisi::findOrFail($id);
        if ($visimisi) {
            $visimisi->delete();
            return redirect()->back()->with(['success' => 'deleted successfully']);
        } else {
            return redirect()->back()->with(['failed' => 'Ada kesalahan system']);
        }
    }
}
