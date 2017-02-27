<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Vote;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
	public function show($id)
	{
		if (Auth::check())
		{
			$votes = Vote::where('user_id', Auth::user()->id)->where('post_id', $id)->get();
			if (!$votes->isEmpty())
				return $votes->first()->sign;
			else
				return -1;
		}
		else
			return -1;
	}
    public function store(Request $request)
    {
		Vote::updateOrCreate(
			['user_id' => Auth::user()->id, 'post_id' => $request->input('post')],
			['sign' => boolval($request->input('sign'))]
		);
	}
}
