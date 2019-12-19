@extends('layouts.app')

@section('title', 'Edit Comment')
    
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="text-align: center">Edit Comment</h3>
            </div>
            <div class="card-body p-3">
                <div class="post">
                    <div class="form-group">
                        <form method="POST" action="{{ route('comment.user.update', [$comment->id]) }}">
                            <div class="center">
                                @csrf
                                <h3 style="font-size: small">Content<h3>
                                <textarea class="form-control" name="content" rows="5" maxlength="250">{{$post->content}}</textarea><br>
                                <input class="btn btn-primary mb-2" type="submit" value="Edit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection