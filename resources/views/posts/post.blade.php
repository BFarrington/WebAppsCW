@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <h2>{{$post->user->name}}'s Post</h2>
    <div class="post">
        <p>{{$post -> content}}</p>
    </div>
    @foreach ($post->comments as $comment)
        <div class="comment">
            <h3>{{$comment->user->name}}</h3>
            <p>{{$comment->content}}</p>
        </div>
    @endforeach
@endsection