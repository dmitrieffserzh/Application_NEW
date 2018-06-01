<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model {

	public $type = 'news';

	protected $appends = ['liked'];

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

	public function like() {
		return $this->morphMany(Like::class, 'content');
	}

	public function getLikedAttribute() {
		$like = $this->like()->where('user_id', Auth::id())->first();
		return !is_null($like);
	}

	public function owner() {
		return $this->belongsTo(User::class, 'user_id');
	}

	public function comments() {
		return $this->morphMany(Comment::class, 'content')->withTrashed();
	}
}
