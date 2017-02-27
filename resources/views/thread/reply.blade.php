@extends('layouts.app')

@section('content')
    <h2>Reply to {{ $thread->name }} <small>in {{ $thread->section->name }}</small></h2>

    <form action="/post" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="hidden" name="thread_id" value="{{ $thread->id }}">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" rows="5" autofocus="autofocus">{{ isset($quote) ? '[quote=\'' . $quote->user->name . '\']' . $quote->content . '[/quote]': '' }}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection