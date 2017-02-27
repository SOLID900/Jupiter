<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = [
    	'content', 'thread_id', 'user_id', 'created_at', 'updated_at'
	];

	protected $touches = ['thread'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function thread()
	{
		return $this->belongsTo('App\Thread');
	}

	public function votes()
	{
		return $this->hasMany('App\Vote');
	}
}
