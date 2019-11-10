
@extends('layouts.app')

@section('title', 'Posts')

<style>
    .post 
    {
        background-color: whitesmoke;
        color: gray;
        margin: 1%;
        margin-left: 25%;
        margin-right: 25%;
        padding: 1%;
    }
    h2
    {
        text-align: center
    }
    a
    {
        color: gray;
        text-decoration: unset;
    }
</style>

@section('content')
    <h2>All Posts</h2>
    @foreach($posts as $post)
        <a href="/posts/{{$post -> id}}">
            <div class="post">
                <p style="text-align: center">{{$post -> content}}</p>
                <h3 style="text-align: right">{{$post -> user -> name}} </h3>
            </div>
        </a>
    @endforeach
@endsection