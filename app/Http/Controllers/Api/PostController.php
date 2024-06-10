<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
     //quando usamo la funzione paginate i dati saranno in data 
    //  $posts=Post::paginate(5);
    // $posts=Post::all();
    $posts = Post::with('category')->paginate(5);//or all()
     //dd($posts);
      return response()->json([
        'success' => true,
        'results' => $posts
      ]);
    }
    public function show($slug)
    {
        //se vogliamo vedere anche le entita relazionate usimo with 
        $post = Post::where('slug', $slug)->with('category', 'tags')->first();
        if($post){
            return response()->json([
                'success' => true,
                'results' => $post
            ]);
        }else{
            return response()->json([
                'success' => false,
                'results' => 'Post not found'
            ]);
        }
       
    }
}
