<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePostRequest;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {     
        
        $categories = Category::pluck('name', 'id');
       $tags = Tag::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {       
        $post = Post::create($request->all());

         if($request->file('file')){
            $url = Storage::put('posts',$request->file('file'));
              $post->image()->create([
                 'url' => $url
        ]); 
        }


        if ($request->tags){
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('admin.posts.edit',$post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
