@extends('layouts.app')

@section('content')
    <h2>{{ $section->name }}</h2>

    @if(Auth::check())
        <a class="btn btn-default" href="/section/{{ $section->id }}/newthread" role="button">New thread</a>
    @endif
    <ul class="list-group">
        @foreach($threads as $thread)
            <li class="list-group-item row">
                <h4 class="col-md-8">
                    <a href="/thread/{{ $thread->id }}">{{ $thread->name }}</a>
                    <br>
                    <small>by <b><a href="/user/{{ $thread->user->id }}">{{ $thread->user->name }}</a></b></small>
                </h4>

                <div class="col-md-4">
                    <p><b>{{ $thread->posts()->count() }}</b> posts</p>
                    <p>Last post <b title="{{ $thread->lastpost->created_at->toDayDateTimeString() }}">{{ $thread->lastpost->created_at->diffForHumans() }}</b> by <b><a href="/user/{{ $thread->lastpost->user->id }}">{{ $thread->lastpost->user->name }}</a></b></p>
                </div>
            </li>
        @endforeach
    </ul>

    {{ $threads->links() }}

@endsection