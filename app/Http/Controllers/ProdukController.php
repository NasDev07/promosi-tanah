<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $menuProduk = 'active';

        return view('dashboard.produk.index', compact('menuProduk', 'produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menuProduk = 'active';        
        return view('dashboard.produk.create', compact('menuProduk'));
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
                'image1' => 'image|file|mimes:jpeg,png,jpg,max:3072',
                'image2' => 'image|file|mimes:jpeg,png,jpg,max:3072',
                'image3' => 'image|file|mimes:jpeg,png,jpg,max:3072',
                'image4' => 'image|file|mimes:jpeg,png,jpg,max:3072',
                'body' => 'required|min:10',
            ]);

            if ($request->file('image')) {
                $validatedData['image'] = $request->file('image')->store('images');
            }
            if ($request->file('image1')) {
                $validatedData['image1'] = $request->file('image1')->store('images');
            }
            if ($request->file('image2')) {
                $validatedData['image2'] = $request->file('image2')->store('images');
            }
            if ($request->file('image3')) {
                $validatedData['image3'] = $request->file('image3')->store('images');
            }
            if ($request->file('image4')) {
                $validatedData['image4'] = $request->file('image4')->store('images');
            }

            $validatedData['user_id'] = auth()->user()->id;            

            Produk::create($validatedData);

            return redirect()->route('produk.index')->with(['success' => 'created successfully']);
        } catch (Exception $e) {
            return redirect()->route('produk.index')->with(['failed' => 'Ada kesalahan system. error :' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menuProduk = 'active';
        $produk = Produk::findOrFail($id);
        return view('dashboard.produk.show', compact('produk', 'menuProduk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menuProduk = 'active';
        $produk = Produk::findOrFail($id);
        return view('dashboard.produk.edit', [
            'produk' => $produk,
            'menuProduk' => $menuProduk,            
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
                'image1' => 'image|file|mimes:jpeg,png,jpg,max:3072',
                'image2' => 'image|file|mimes:jpeg,png,jpg,max:3072',
                'image3' => 'image|file|mimes:jpeg,png,jpg,max:3072',
                'image4' => 'image|file|mimes:jpeg,png,jpg,max:3072',
                'body' => 'required|min:10',
            ]);

            $produk = Produk::findOrFail($id);

            if ($request->file('image')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $validatedData['image'] = $request->file('image')->store('images');
            }
            if ($request->file('image1')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $validatedData['image1'] = $request->file('image1')->store('images');
            }
            if ($request->file('image2')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $validatedData['image2'] = $request->file('image2')->store('images');
            }
            if ($request->file('image3')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $validatedData['image3'] = $request->file('image3')->store('images');
            }
            if ($request->file('image4')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $validatedData['image4'] = $request->file('image4')->store('images');
            }

            $validatedData['user_id'] = auth()->user()->id;            

            $produk->update($validatedData);

            return redirect()->route('produk.index')->with(['success' => 'Update successfully']);
        } catch (Exception $e) {
            return redirect()->route('produk.index')->with(['failed' => 'Ada kesalahan system. error :' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);
        if ($produk) {
            $produk->delete();
            return redirect()->back()->with(['success' => 'deleted successfully']);
        } else {
            return redirect()->back()->with(['failed' => 'Ada kesalahan system']);
        }
    }
}
