@extends('layouts.app')

@section('content')
    <ul class="nav nav-pills">
        <li role="presentation" class="{{ $seeReceived ? 'active' : '' }}"><a href="/pm/?see=received">Received</a></li>
        <li role="presentation" class="{{ $seeReceived ? '' : 'active' }}"><a href="/pm/?see=sent">Sent</a></li>
    </ul>
    <h3>{{ $privMsgs->total() }} messages</h3>
    <ul class="list-group">
    @foreach($privMsgs as $pm)
        <a href="/pm/{{ $pm->id }}" class="list-group-item {{ $pm->read ? '' : 'list-group-item-info' }}">
            <div class="row">
                <div class="col-md-3 text-overflow-ellipsis">
                    <b>{{ $pm->title }}</b>
                </div>
                <div class="col-md-4 text-overflow-ellipsis">
                    {{ $pm->content }}
                </div>
                <div class="col-md-3 text-overflow-ellipsis">
                    {{ $seeReceived ? $pm->author->name : $pm->recipient->name }}
                </div>
                <div class="col-md-2">
                    {{ $pm->created_at }}
                </div>
            </div>
        </a>
    @endforeach
    </ul>

    {{ $privMsgs->links() }}
@endsection