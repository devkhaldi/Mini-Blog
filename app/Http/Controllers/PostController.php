<?php

namespace App\Http\Controllers;

use App\Category;
use App\Media;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all() ;
        return view('post.create',['categories'=>$categories]) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post() ;
        $post->title = $request->input('title') ;
        $post->content = $request->input('content') ;
        $post->user_id = Auth::id() ;
        $post->category_id = $request->input('category_id') ;
        $post->save() ;

        // Save Images 
        if ($request->hasFile('file')) {
            $files = $request->file('file') ;
            foreach ($files as $file) {
                $media = new Media() ;
                $media->file = $file->store('media') ;
                $post->media()->save($media) ;
            }
        }
        return redirect('/') ; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',['post'=>Post::find($post) ]) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all() ;
        $post = Post::find($post) ;
        return view('post.create',[
                'categories'=>$categories,
                'post' => $post
            ]) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post = Post::find($post);
        $post->title = $request->input('title') ;
        $post->content = $request->input('content') ;
        $post->user_id = Auth::id() ;
        $post->category_id = $request->input('category_id') ;
        $post->save() ;

        // Save Images 
        if ($request->hasFile('file')) {
            $files = $request->file('file') ;
            foreach ($files as $file) {
                $media = new Media() ;
                $media->file = $file->store('media') ;
                $post->media()->save($media) ;
            }
        }
        return redirect('/') ; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete() ;
    }
}
