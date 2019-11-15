@extends('layouts.post')

@section('title', 'Post - {{$post->title}}')

@section('content')
    <h2>{{$post->user->name}}'s Post</h2>
    <div class="post">
        <h1 style="text-align:center">{{$post -> title}}}</h1>
        <p>{{$post -> content}}</p>
    </div>
    @foreach ($post->comments as $comment)
        <div class="post">
            <h3>{{$comment->user->name}}</h3>
            <p>{{$comment->content}}</p>
        </div>
    @endforeach
    <div class="post" id="comment">
        <form method="POST" action="{{ route('comment.store', [$post->id]) }}#comment">
            @csrf
            <textarea class="comment" name="content" rows="5" maxlength="250"></textarea><input class="button" type="submit" value="Submit">
            <input type="hidden" name="post_id" value="{{$post->id}}">
        </form>
    </div>
@endsection