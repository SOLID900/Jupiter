<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use App\Thread;
use App\Post;
use Auth;

class ThreadController extends Controller
{
    public function store(Request $request)
    {
		$thread_id = Thread::create(
			[
				"name" => $request['name'],
				"section_id" => $request['section_id']
			]
		)->id;

		Post::create(
			[
				"content" => $request['content'],
				"thread_id" => $thread_id,
				"user_id" => Auth::user()->id
			]
		);
		return redirect('/thread/' . $thread_id);
    }

    public function show($id)
    {
        $thread = Thread::find($id);
		$section = $thread->section();
		$posts = $thread->posts()->paginate(10);
		return view('thread.show', compact('thread', 'section', 'posts'));
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

    public function reply($id)
	{
		$thread = Thread::find($id);
		if (isset($_GET["q"]))
		{
			$quote = Post::find($_GET["q"]);
			return view('thread.reply', compact('thread', 'quote'));
		}
		else
			return view('thread.reply', compact('thread'));
	}
}
