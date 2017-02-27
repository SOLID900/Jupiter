@extends('layouts.app')

@section('content')
    <h2>Create thread in <i>{{ $section->name }}</i></h2>
    <form action="/thread" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="hidden" name="section_id" value="{{ $section->id }}">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name" autocomplete="off">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection