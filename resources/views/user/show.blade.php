@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h1>{{ $user->name }}</h1>
    </div>
    <div class="row">
        <div class="col-md-2">
            @if( !empty($user->avatar) )
                <img src="{{ $user->avatar }}" class="img-rounded useravatar col-centered" />
            @else
                <img src="/resources/avatar/jupiter.png" class="img-rounded useravatar col-centered" />
            @endif
        </div>
        <div class="col-md-10">
            <p>{{ $user->posts()->count() }} posts</p>
            <p>Joined <i>{{ $user->created_at->toFormattedDateString() }}</i></p>
            @if(Auth::check() and Auth::user()->id == $user->id)
            <a class="btn btn-default pull-right" href="/user/{{ $user->id }}/edit" role="button">Edit</a>
            @endif
        </div>
    </div>
@endsection