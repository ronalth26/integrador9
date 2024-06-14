<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;


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
        ]);
        $post = Post::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'extract' => $request->extract,
            'body' => $request->body,
            'status' => $request->status,
            'id_user' => $request->id_user,
            'id_category' => $request->id_category,
        ]);

        return redirect()->route('posts.index');
    }
}

