<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = bcrypt($value);
	}

	public function posts()
	{
		return $this->hasMany('App\Post');
	}

	public function privateMessagesSent()
	{
		return $this->hasMany('App\PrivateMessage', 'author_id');
	}

	public function privateMessagesReceived()
	{
		return $this->hasMany('App\PrivateMessage', 'recipient_id')->orderBy('id', 'desc');
	}
}
