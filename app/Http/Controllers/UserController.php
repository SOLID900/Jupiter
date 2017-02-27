<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
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
        //
    }
    public function show($id)
    {
    	$user = User::find($id);
		return view('user.show', compact('user'));
    }
    public function edit($id)
    {
		$user = User::find($id);
		return view('user.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
		$user = User::find($id);
		$user->email = $request->email;
		$user->avatar = $request->avatar;
		$user->save();
		return redirect('/user/' . $user->id);
    }
    public function destroy($id)
    {
        //
    }
}
