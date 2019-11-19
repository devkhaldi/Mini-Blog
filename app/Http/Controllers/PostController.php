<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Media;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show') ;
    }
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
        if(Auth::id()) {
            $categories = Category::all() ;
            return view('post.create',['categories'=>$categories]) ;
        }
        else return redirect('/') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post() ;
        $post->title = $request->input('title') ;
        $post->content = $request->input('content') ;
        $post->user_id = Auth::id() ;
        $post->category_id = $request->input('category_id') ;
        $post->save() ;
        // Save post files 
            $postFiles = $request->file('postFiles') ;
            foreach ($postFiles as $postFile) {
                $postMedia = new Media() ;
                $postMedia->post_id = $post->id ;
                $postMedia->file = $postFile->store('media') ;
                $post->media()->save($postMedia) ;
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
        if($post->user_id == Auth::id()) {
            $categories = Category::all() ;
            $postdata = Post::find($post->id) ;
            return view('post.edit',['categories'=>$categories,'post' => $postdata]) ;
        }
        else return redirect('/') ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        if(Auth::id() == $post->user_id) {

            $post = Post::find($post->id);
            $post->title = $request->input('title') ;
            $post->content = $request->input('content') ;
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
