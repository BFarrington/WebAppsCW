@extends('layouts.post')

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
    <div>
        <form method="POST" action="{{ route('post.store', [$post->id]) }}">
            @csrf
            <textarea name="content" rows="5" maxlength="250"></textarea><input type="submit" value="Submit">
            <input type="hidden" name="post_id" value="{{$post->id}}">
        </form>
    </div>
@endsection