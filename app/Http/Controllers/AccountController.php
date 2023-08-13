<?php

namespace App\Http\Controllers;

use App\Models\Accon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Accon::where('user_id', auth()->user()->id)->first();
        $datauser = 'active';
        return view('dashboard.account.index', compact('datauser', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datauser = 'active';
        return view('dashboard.account.index', compact('datauser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $validatedData = $request->validate([
            'noHp' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'lokasi' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|string|max:255',
            'foto_ktp' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'body' => 'nullable|min:3',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images');
        }
        if ($request->file('foto_ktp')) {
            $validatedData['foto_ktp'] = $request->file('foto_ktp')->store('images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Accon::create($validatedData);        

        return redirect()->back()->with(['success' => 'Data successfully']);
            // return redirect()->route('account.index')->with(['success' => 'created successfully']);
        } catch (Exception $e) {
            return redirect()->back()->with(['failed' => 'Ada kesalahan system. error :' . $e->getMessage()]);
            // return redirect()->route('account.index')->with(['failed' => 'Ada kesalahan system. error :' . $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datauser = 'updated';
        $data = Accon::all();
        return view('dashboard.account.index', compact('datauser', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)

    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'noHp' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
                'lokasi' => 'nullable|string|max:255',
                'jenis_kelamin' => 'nullable|string|max:255',
                'foto_ktp' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
                'body' => 'nullable|min:3',
            ]);

            $post = Accon::findOrFail($id);

            if ($request->file('image')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $validatedData['image'] = $request->file('image')->store('images');
            }

            if ($request->file('foto_ktp')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $validatedData['foto_ktp'] = $request->file('foto_ktp')->store('images');
            }

            $validatedData['user_id'] = auth()->user()->id;

            $post->update($validatedData);

            return redirect()->route('account.index')->with(['success' => 'Update successfully']);
        } catch (Exception $e) {
            return redirect()->route('account.index')->with(['failed' => 'Ada kesalahan system. error :' . $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Accon::findOrFail($id);
        $data->delete();
        return redirect()->back()->with(['success' => 'deleted successfully']);
    }
}
