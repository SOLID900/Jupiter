@extends('layouts.app')

@section('content')
    <h2>Create section</h2>
    <form action="/section" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" placeholder="Description">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection