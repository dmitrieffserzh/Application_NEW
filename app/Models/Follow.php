<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follow extends Model {

	use SoftDeletes;

	protected $table = 'follows';

	protected $fillable = [
		'user_id',
		'follower_id',
		'deleted_at',
	];

	protected $dates = ['deleted_at'];

}
