@extends('layouts.app')

@section('content')
    <h2><small>Title: </small>{{ $pm->title }}</h2>
    @if($pm->recipient->id == Auth::user()->id)
        <h2><small>By: </small><a href="/user/{{ $pm->author->id }}">{{ $pm->author->name }}</a></h2>
    @else
        <h2><small>To: </small><a href="/user/{{ $pm->recipient->id }}">{{ $pm->recipient->name }}</a></h2>
    @endif

    <div class="well">
        <p>{!! BBCode::parse(htmlentities($pm->content)) !!}</p>
    </div>
@endsection