<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;

class CategoryController extends Controller {

	public function __construct() {
		//$this->middleware('auth');
	}

	public function index() {
		return view( 'admin.categories.index', [
			'category'   => [],
			'categories' => Category::with( 'children' )->where( 'parent_id', '0' )->paginate( 15 ),
			'delimiter'  => ''
		] );
	}

	public function create() {
		return view( 'admin.categories.create', [
			'category'   => [],
			'categories' => Category::with( 'children' )->where( 'parent_id', '0' )->get(),
			'delimiter'  => ''
		] );
	}

	public function store( Request $request ) {
//		request()->validate([
//			'title' => 'required',
//			'slug' => 'required|unique:categories,slug',
//		]);

		Category::create( $request->all() );

		return redirect()->route( 'admin.categories.index' )
		                 ->with( 'success', 'Категория успешно добавлена' );
	}

	public function show( $id ) {
		$category = Category::findOrFail( $id );

		return view( 'admin.categories.show', compact( 'category' ) );
	}

	public function edit( $id ) {
		$categories = Category::find( $id );

		return view( 'admin.categories.create', compact( 'categories' ) );
	}

	public function update( Request $request, $id ) {
		request()->validate( [
			'title' => 'required',
			'slug'  => 'required|unique:categories,slug',
		] );

		Category::find( $id )->update( $request->all() );

		return redirect()->route( 'admin.categories.index' )
		                 ->with( 'success', 'Категория успешно обновлена!' );
	}

	public function destroy( $id ) {
		Category::find( $id )->delete();

		return redirect()->route( 'admin.categories.index' )
		                 ->with( 'success', 'Категория удалена!' );
	}

}
