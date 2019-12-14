@extends('layouts.app')

@section('title', 'Post')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="text-align: center">{{$post -> title}}}</h3>
            </div>
            <div class="card-body p-3">
                <blockquote class="blockquote mb-0">
                    <p class="card-text">{{$post->content}}</p>
                    <footer class="blockquote-footer">{{$post->user->name}}</footer>
                </blockquote>

                @foreach ($post->comments as $comment)
                <div class="card p-3" style="margin-top: .5rem">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                        <p class="card-text">{{$comment->content}}</p>
                        <footer class="blockquote-footer">{{$comment->user->name}}</footer>
                        </blockquote>
                    </div>
                </div>
            @endforeach
            </div>
        </div>



        <div class="card p-3" style="margin-top: .5rem">
            <h5 class="class-title">
                Make a comment:
            </h5>
            <div class="card-body">
                <div class="form-group" id="comment">
                    <form method="POST" action="{{ route('comment.store', [$post->id]) }}#comment">
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