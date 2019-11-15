@extends('layouts.post')

@section('title', 'Create Post')
    
@section('content')
    <div class="post">
        <form method="POST" action="{{ route('post.store') }}">
            @csrf
            <input type="text" name="title" maxlength="100"><br>
            <textarea name="content" rows="5" maxlength="250"></textarea><input type="submit" value="Submit">
        </form>
    </div>
@endsection