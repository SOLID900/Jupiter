<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Thread;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SectionsController extends Controller
{
    public function index()
    {
        return redirect('/');
    }

    public function create()
    {
        return view('section.create');
    }

    public function store(Request $request)
    {
        Section::create($request->all());
		return redirect('/');
    }

    public function show($id)
    {
    	$section = Section::find($id);

        $threads = $section->threads()->orderBy('updated_at', 'desc')->paginate(10);

        return view('section.show', compact('threads', 'section'));
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

    public function newthread($id)
	{
		$section = Section::find($id);
		return view('section.newthread', compact('section'));
	}
}
