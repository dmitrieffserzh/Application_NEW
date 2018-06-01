<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Event;

class PostController extends Controller {


	public function index() {

		return view( 'news.index', [
			'posts' => Post::paginate( 15 )
		] );
	}

	public function show( $id ) {

		$post = Post::find( $id );
		Event::fire( 'news.view', $post );

		return view( 'news.view', [
			'post' => $post
		] );
	}
}
