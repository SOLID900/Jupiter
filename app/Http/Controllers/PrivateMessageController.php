<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\PrivateMessage;
use App\User;

class PrivateMessageController extends Controller
{
    public function index()
    {
    	$seeReceived = !(isset($_GET['see']) and $_GET['see']=='sent');

    	if ($seeReceived)
			$privMsgs = Auth::user()->privateMessagesReceived()->paginate(10);
		else
			$privMsgs = Auth::user()->privateMessagesSent()->paginate(10);

		return view('pm.index', compact('privMsgs', 'seeReceived'));
    }

    public function create()
    {
    	if ( !isset($_GET['to']) )
			return redirect('/');
		else
		{
			$user = User::find($_GET['to']);
			return view('pm.create', compact('user'));
		}
    }

    public function store(Request $request)
    {
		$pm_id = PrivateMessage::create([
			'title' => $request['title'],
			'author_id' => Auth::user()->id,
			'recipient_id' => $request['to'],
			'content' => $request['content'],
		])->id;
		return redirect('/pm/' . $pm_id);
    }
    public function show($id)
    {
        $pm = PrivateMessage::find($id);
        if ($pm->recipient_id == Auth::user()->id)
		{
			$pm->read = true;
			$pm->save();
		}
        return view('pm.show', compact('pm'));
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
