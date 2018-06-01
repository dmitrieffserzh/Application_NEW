<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Story extends Model {

	public $type = 'story';

	protected $appends = ['liked'];

	protected $fillable = ['user_id', 'title', 'content'];


	// RELATIONS
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
