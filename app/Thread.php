<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
    	'name', 'section_id'
	];

	public function section()
	{
		return $this->belongsTo('App\Section');
	}

	public function posts()
	{
		return $this->hasMany('App\Post');
	}

	public function getLastpostAttribute()
	{
		return $this->posts()->latest()->first();
	}

	public function user()
	{
		return $this->posts()->first()->user();
	}
}
