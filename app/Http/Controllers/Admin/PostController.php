<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Post;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller {


	public function index() {

		return view( 'admin.posts.index', [
			'posts' => Post::paginate( 15 )
		] );
	}


	public function create() {
		return view( 'admin.posts.create', [
			'category'   => [],
			'categories' => Category::with( 'children' )->where( 'parent_id', '0' )->get(),
			'delimiter'  => ''
		] );
	}


	public function store( Request $request ) {

		$data      = $request->all();
		$validator = Validator::make( $data, [
			'title'       => 'required',
			'content'     => 'required',
			'category_id' => 'numeric|min:1'
		] );

		if ( $validator->fails() ) {
			return redirect()->back()->with( 'error', $validator->messages() );
		}


		$post              = new Post;
		$post->author_id   = Auth::id();
		$post->category_id = $data['category_id'];
		$post->title       = $data['title'];
		$post->content     = $data['content'];
		$post->published   = $data['published'];
		$post->image       = $data['image'];
		$post->save();

		return redirect()->route( 'admin.posts.index' )
		                 ->with( 'success', 'Новость успешно опубликована!' );

	}


	public function show( $id ) {

		return view( 'admin.posts.show', [
			'post' => Post::findOrFail( $id )
		] );
	}


	public function edit( $id ) {


	}


	public function update( Request $request, $id ) {


	}


	public function destroy( $id ) {


	}
}
