<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        $post = new Post();
        $post->user_id = Auth::id();
        $post->content = $request["content"];
        $post->image = $imagePath;
        $post->save();


        return back()->with('status', 'post created');
    }

    public  function edit(Post $post){
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }
    public function update(Request $request, Post $post){
        $this->authorize('update', $post);
        $request->validate([
            'content' => 'required|string|max:1000',
            'image' => 'nullable|image|max:2048',
        ]);
        if($request->hasFile('image')){
            if($post->image){
                Storage::disk('public')->delete($post->image);
            }
            $post->image = $request->file('image')->store('posts', 'public');
        }
        $post->content = $request->content;
        $post->save();
        return redirect()->route('posts.index')->with('status', 'post updated');
    }
    public  function destroy(Post $post){
        $this->authorize('delete', $post);
        if($post->image){
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return back()->with('status', 'post deleted');
    }
}
