
@extends('layouts.post')

@section('title', 'Feed')

@section('content')
    <h2>Content Feed</h2>
    @foreach($posts as $post)
        <a href="{{ route('post.show', [$post->id]) }}">
            <div class="post">
                <h3 style="text-align: center">{{$post -> title}}</h3>
                <p style="text-align: center">{{$post -> content}}</p>
                <h3 style="text-align: right">{{$post -> user -> name}} </h3>
            </div>
        </a>
    @endforeach
@endsection