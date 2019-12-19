@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-2">
                <div class="card-header">
                    Profile info
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Name: {{$user->name}}</li>
                        <li class="list-group-item">Email: {{$user->email}}</li>
                    </ul>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header">
                    Your Posts
                </div>
                <div class="card-body">
                    {{$posts = $user->posts()->orderBy('created_at','desc')->paginate(25)}}
                    <ul class="list-group">
                        @foreach($posts as $post)
                            <li class="list-group-item">
                                <a href="{{ route('post.show', [$post->id]) }}">
                                    <h5>{{$post -> title}}</h5>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header">
                    Your Comments
                </div>
                <div class="card-body">
                    {{$comments = $user->comments()->orderBy('created_at','desc')->paginate(5)}}
                    @foreach ($comments as $comment)
                        <div id="{{$comment->id}}" class="card mb-2">
                            <div class="card-body">
                                <blockquote class="blockquote">
                                <p class="card-text">{{$comment->content}}</p>
                                <footer class="blockquote-footer">{{$comment->user->name}}</footer>
                                </blockquote>
                            </div>
                            @if(Auth::user()->is_admin == 1)
                                <div class="card-footer">
                                    <form method="POST" action="{{route('comment.destroy', [$post->id])}}">
                                        @csrf
                                        <input class="btn btn-primary" type="submit" value="Delete">
                                    </form>
                                </div>
                            @elseif(Auth::user()->id == $comment->user_id)
                                <div class="card-footer">
                                    <form class="form-group" method="POST" action="{{route('comment.user.destroy', [$comment->id])}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$comment->id}}">
                                        <input class="btn btn-primary" type="submit" value="Delete">
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection