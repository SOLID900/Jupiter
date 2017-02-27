<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;

class ForumController extends Controller
{
    public function index()
	{
		$sections = Section::All();
		return view('index', compact('sections'));
	}
}
