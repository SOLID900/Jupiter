<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Thread;

class PostController extends Controller
{
    public function index()
	{
		//
	}
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
		Post::create(
			[
				"content" => $request['content'],
				"thread_id" => $request['thread_id'],
				"user_id" => Auth::user()->id
			]
		);

		$thread = Thread::find($request['thread_id']);
		$last_page = $thread->posts()->paginate(10)->lastPage();
		return redirect('/thread/' . $request['thread_id'] . '?page=' . $last_page);
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
