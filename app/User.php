<?php

namespace App;

use App\Models\Profile;
use App\Models\Story;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


	// RELATIONS
    public function liked() {
        return $this->morphedByMany( Story::class, 'content_id' )->whereDeletedAt( null );
    }

    public function profile() {
        return $this->hasOne( Profile::class );
    }

	public function story() {
		return $this->hasMany( Story::class );
	}

	public function posts() {
		return $this->hasMany( Post::class );
	}

    public function isOnline() {
        return Cache::has( 'user-is-online-' . $this->id );
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function followers() {
        return $this->belongsToMany( User::class, 'follows', 'user_id', 'follower_id' )->withTimestamps();
    }

    public function followings() {
        return $this->belongsToMany( User::class, 'follows', 'follower_id', 'user_id' )->withTimestamps();
    }
}
