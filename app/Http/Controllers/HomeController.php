<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $post = Post::take(5)->get();
        $hot_posts = Post::take(10)->get();


        return view('home', [
            'posts' => $post,
            'hot_posts' => $hot_posts
        ]);
    }
}
