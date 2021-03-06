@extends('layouts.app')
@section('title', 'Post')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="text-align: center">{{$post -> title}}</h3>
            </div>
            <div class="card-body p-3">
                @if ($post->filename != '')
                    <img class="img-fluid rounded mx-auto d-block"  src="/images/{{$post->filename}}" alt="No image">
                @endif
                <blockquote class="blockquote mb-0 p-3">
                    <p class="card-text">{{$post->content}}</p>
                    <footer class="blockquote-footer">{{$post->user->name}}</footer>
                </blockquote>
                {{$comments = $post->comments()->orderBy('created_at','desc')->paginate(10)}}
                <div id="comments">
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
                                <form method="POST" action="{{route('comment.destroy', [$comment->id])}}">
                                    @csrf
                                    <input class="btn btn-primary" type="submit" value="Delete">
                                </form>
                            </div>
                        @elseif(Auth::user()->id == $comment->user_id)
                            <div class="card-footer">
                                <div class = "form-inline">
                                <form class="form-group" method="POST" action="{{route('comment.user.destroy', [$comment->id])}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$comment->id}}">
                                    <input class="btn btn-primary" type="submit" value="Delete">
                                </form>
                                <form class="form-group ml-2" method="POST" action="{{route('comment.user.edit', [$comment->id])}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$comment->id}}">
                                        <input class="btn btn-primary" type="submit" value="Edit">    
                                </form>
                                </div>
                            </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                <div style="margin-top: .5rem">
                {{$comments->links()}}
                </div>
            </div>

            <div class="card-footer text-muted">

            @if(Auth::user()->is_admin == 1)
            <form method="POST" action="{{route('post.destroy', [$post->id])}}">
                @csrf
                <input class="btn btn-primary" type="submit" value="Delete">
            </form>

            @elseif(Auth::user()->id == $post->user_id)
            <div class="form-inline">
                <form class="form-group" method="POST" action="{{route('post.user.destroy', [$post->id])}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$post->id}}">
                    <input class="btn btn-primary" type="submit" value="Delete">
                </form>

                <form class="form-group"  method="POST" action="{{route('post.user.edit', [$post->id])}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$post->id}}">
                    <input class="btn btn-primary m-2" style="margin-top:.5rem" type="submit" value="Edit">    
                </form>
            </div>

            @endif
            </div>
        </div>
        <div class="card p-3 mt-2">
            <h5 class="class-title">
                Make a comment:
            </h5>
            <div class="card-body">
                <div class="form-group" id="comment">
                    <form method="POST" action="{{ route('comment.store', [$post->id]) }}">
                        @csrf
                        <textarea class="form-control" name="content" rows="5" maxlength="250"></textarea>
                        <input class="btn btn-primary mb-2" style="margin-top:.5rem" type="submit" value="Submit">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection