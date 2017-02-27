<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
    	'name', 'description'
	];

	public function threads()
	{
		return $this->hasMany('App\Thread');
	}

	public function posts_count()
	{
		$posts_count = 0;
		foreach ($this->threads()->get() as $thread)
			$posts_count += $thread->posts()->count();
		return $posts_count;
	}

}
