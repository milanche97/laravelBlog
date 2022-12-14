<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index (){
        $posts = Post::all();
        return view ('posts.index',compact('posts') );
    }

    public function show ($id){
        $post = Post::with('comments')->find($id);

        return view('posts.show', compact('post'));
    }

    public function create (){
        return view('posts.create');
    }
    public function store (){
        // $post = new Post();
        // $post ->title = request('title');
        // $post ->body = request('body');
         
        // $post->save();
        $this -> validate(
            request(),
            ['title' => 'required|max:20',
            'body' => 'required'                    //za ogranicenja npr koliko moze
            ]
        );
        
        Post::create([
            'title' => request('title'),
            'body' => request('body')
        ]);

        return redirect('/posts');
    }
}
