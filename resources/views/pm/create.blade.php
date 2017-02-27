@extends('layouts.app')

@section('content')
    <h3>New private message</h3>

    <form action="/pm" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="to" value="{{ $user->id }}">
        <div class="form-group">
            <label>To</label>
            <p class="form-control-static">{{ $user->name }}</p>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" rows="5" autofocus="autofocus"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection