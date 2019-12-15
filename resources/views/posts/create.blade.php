@extends('layouts.app')

@section('title', 'Create Post')
    
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="text-align: center">Create a Post</h3>
            </div>
            <div class="card-body p-3">
                <div class="post">
                    <div class="form-group">
                        <form method="POST" action="{{ route('post.store') }}">
                            <div class="center">
                                @csrf
                                <h3 style="font-size: small">Post Title</h3>
                                <textarea class="form-control" name="title" rows="1" maxlength="50"></textarea><br>
                                <h3 style="font-size: small">Content<h3>
                                <textarea class="form-control" name="content" rows="15" maxlength="500"></textarea><br>
                                <input class="btn btn-primary mb-2" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection