<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
       
        $posts = Post::where('status', 2)->get();
        return view('posts.index', compact('posts'));

    }

    public function create()
    {
        $users = User::all();
        $categories = Category::all();
    
        $view = view('posts.modal.crear', compact('users', 'categories'));

        // Si la solicitud es ajax, retorna la vista renderizada en formato JSON
        if (request()->ajax()) {
            return response()->json(['html' => $view->render()]);
        } else {
            return $view;
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'extract' => 'required|string',
            'body' => 'required|string',
            'status' => 'required|in:1,2',
            'id_user' => 'required|exists:users,id',
            'id_category' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Añadir validación para imagen
        ]);

        $post = new Post($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $post->image = $path;
        }

        $post->save();

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $users = User::all();
        $categories = Category::all();
        return view('posts.edit', compact('post', 'users', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $id,
            'extract' => 'required|string',
            'body' => 'required|string',
            'status' => 'required|in:1,2',
            'id_user' => 'required|exists:users,id',
            'id_category' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Añadir validación para imagen
        ]);

        $post = Post::findOrFail($id);
        $post->fill($request->all());

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete($post->image);
            }
            $path = $request->file('image')->store('images');
            $post->image = $path;
        }

        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->image) {
            Storage::delete($post->image);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }

}

