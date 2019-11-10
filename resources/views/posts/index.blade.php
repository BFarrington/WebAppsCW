
@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h2>All Posts</h2>
    @foreach($posts as $post)
        <a href="{{ route('post.show', [$post->id]) }}">
            <div class="post">
                <p style="text-align: center">{{$post -> content}}</p>
                <h3 style="text-align: right">{{$post -> user -> name}} </h3>
            </div>
        </a>
    @endforeach
@endsection