<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	public $fillable = [
		'title',
		'content',
		'author_id',
		'category_id',
		'published',
		'created_at',
		'updated_at'
	];

	public $dates = [
		'created_at',
		'updated_at'
	];


	// RELATIONS
	public function category() {
		return $this->belongsTo(Category::class, 'category_id');
	}
}
