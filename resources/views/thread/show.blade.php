@extends('layouts.app')

@section('content')
    <h2>{{ $thread->name }}</h2>

    @foreach($posts as $post)
        <div class="well" id="post{{ $post->id }}">
            <div class="row">
                <div class="col-md-2">
                    <div class="centered">
                        <p><a href="/user/{{ $post->user->id }}" class="lead">{{ $post->user->name }}</a></p>
                        @if( !empty($post->user->avatar) )
                            <img src="{{ $post->user->avatar }}" class="img-rounded useravatar col-centered" />
                        @else
                            <img src="/resources/avatar/jupiter.png" class="img-rounded useravatar col-centered" />
                        @endif
                        <p>{{ $post->user->posts()->count() }} posts</p>
                        <p>Joined <i>{{ $post->user->created_at->toFormattedDateString() }}</i></p>
                        <div class="btn-group">
                            <a class="btn btn-default" href="/pm/create?to={{ $post->user->id }}" role="button">
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-10"><p>{!! BBCode::parse(htmlentities($post->content)) !!}</p></div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <p><b>{{ $post->created_at->diffForHumans() }}</b> ({{ $post->created_at->toDayDateTimeString() }})</p>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Action to post">
                                <a type="button" class="btn btn-default" href="/thread/{{ $thread->id }}/reply?q={{ $post->id }}">Quote</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a href="#post{{ $post->id }}">post #{{ ($posts->currentPage()-1)*10 + $loop->index + 1 }}</a>
                        </div>
                        <div class="col-md-6">
                            @include('post.vote', [
                                'post_id' => $post->id,
                                'plus'    => $post->votes()->where('sign', '1')->count(),
                                'minus'   => $post->votes()->where('sign', '0')->count(),
                                ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>document.addEventListener('DOMContentLoaded', function() {updateVoteButton({{ $post->id }})}, false);</script>
    @endforeach

    {{ $posts->links() }}

    @if(Auth::check())
        <div class="well">
            <a class="btn btn-default" href="/thread/{{ $thread->id }}/reply" role="button">Reply</a>
        </div>
    @endif

    <script>
        function vote(sign, post)
        {
            $('#vm' + post).prop('disabled', true);
            $('#vp' + post).prop('disabled', true);
            $.ajax({
                method: "POST",
                url: "/votes",
                data: {
                    post: post,
                    sign: sign,
                    _token:'{{ csrf_token() }}'
                }
            })
            .done(function( msg ) {
                updateVoteButton(post);
            });
        }

        function updateVoteButton(post)
        {
            $.ajax({
                method: "GET",
                url: "/votes/" + post,
                data: {
                    _token:'{{ csrf_token() }}'
                }
            })
            .done(function( msg ) {
                if (msg != -1)
                {
                    $('#vm' + post).toggleClass('btn-primary', msg == 0).prop('disabled', msg == 0);
                    $('#vp' + post).toggleClass('btn-primary', msg == 1).prop('disabled', msg == 1);
                }
            });
        }
    </script>
@endsection