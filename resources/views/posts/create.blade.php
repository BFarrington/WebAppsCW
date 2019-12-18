@extends('layouts.app')

@section('title', 'Create Post')
    
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="text-align: center">Create a Post</h3>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body p-3">
                <div class="post">
                    <div class="form-group">
                        <form method="POST" action="{{ route('post.store') }}"  enctype="multipart/form-data">
                            <div class="center">
                                @csrf
                                <h5>Post Title</h5>
                                <input type="text" class="form-control" name="title" maxlength="100"/><br>
                                <h5>Image</h5>
                                <input type="file" class="form-control" name="file"/>
                                <h5>Content</h5>
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