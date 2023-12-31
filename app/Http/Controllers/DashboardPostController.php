<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $menuPosts = 'active';

        return view('dashboard.posts.index', compact('menuPosts', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menuPosts = 'active';        
        return view('dashboard.posts.create', compact('menuPosts'));
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
                'body' => 'required|min:10',
            ]);

            if ($request->file('image')) {
                $validatedData['image'] = $request->file('image')->store('images');
            }

            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

            Posts::create($validatedData);

            return redirect()->route('posts.index')->with(['success' => 'created successfully']);
        } catch (Exception $e) {
            return redirect()->route('posts.index')->with(['failed' => 'Ada kesalahan system. error :' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menuPosts = 'active';
        $post = Posts::findOrFail($id);
        return view('dashboard.posts.show', compact('post', 'menuPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menuPosts = 'active';
        $post = Posts::findOrFail($id);
        return view('dashboard.posts.edit', [
            'post' => $post,
            'menuPosts' => $menuPosts,            
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
                'body' => 'required|min:10',
            ]);

            $post = Posts::findOrFail($id);

            if ($request->file('image')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $validatedData['image'] = $request->file('image')->store('images');
            }

            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 50);

            $post->update($validatedData);

            return redirect()->route('posts.index')->with(['success' => 'Update successfully']);
        } catch (Exception $e) {
            return redirect()->route('posts.index')->with(['failed' => 'Ada kesalahan system. error :' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Posts::findOrFail($id);
        if ($post) {
            $post->delete();
            return redirect()->back()->with(['success' => 'deleted successfully']);
        } else {
            return redirect()->back()->with(['failed' => 'Ada kesalahan system']);
        }
    }
}
