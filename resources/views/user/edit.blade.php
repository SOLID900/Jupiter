@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h1>Editing <b>{{ $user->name }}</b></h1>
    </div>
    <form action="/user/{{ $user->id }}" method="POST">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">EMail</label>
            <input type="email" class="form-control" name="email" placeholder="EMail" value="{{ $user->email }}">

            <label for="avatar">Avatar</label>
            <input type="text" class="form-control" name="avatar" placeholder="Avatar" value="{{ $user->avatar }}">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection