<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model
{
	protected $fillable = [
		'title', 'content', 'author_id', 'recipient_id', 'read'
	];

	public function author()
	{
		return $this->belongsTo('App\User', 'author_id');
	}

	public function recipient()
	{
		return $this->belongsTo('App\User', 'recipient_id');
	}
}
