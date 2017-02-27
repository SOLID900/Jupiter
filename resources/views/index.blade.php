@extends('layouts.app')

@section('content')

    <a href="/section/create">Create Section</a>
    <ul class="list-group">
    @foreach($sections as $section)
        <li class="list-group-item row">
            <div class="col-md-8">
                <h3><a href="/section/{{ $section->id }}">{{ $section->name }}</a></h3>
                <h4>{{ $section->description }}</h4>
            </div>

            <div class="col-md-4">
                <p class="">{{ $section->threads()->count() }} threads</p>
                <p>{{ $section->posts_count() }} posts</p>
            </div>
        </li>
    @endforeach
    </ul>

@endsection