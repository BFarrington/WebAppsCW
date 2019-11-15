@extends('layouts.post')

@section('title', 'Create Post')
    
@section('content')
    <div class="post">
        <form method="POST" action="{{ route('post.store') }}">
            <div class="center">
                @csrf
                <h3 style="font-size: small">Post Title</h3>
                <textarea class="shorttext" name="title" rows="1" maxlength="50"></textarea><br>
                <h3 style="font-size: small">Content<h3>
                <textarea class="longtext" name="content" rows="5" maxlength="250"></textarea><br>
                <input class="button" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection