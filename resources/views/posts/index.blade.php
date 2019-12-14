
@extends('layouts.app')

@section('title', 'Feed')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h3 style="text-align: center">Content Feed</h3>
                </div>
                <div class="card-body p3">
                    @foreach($posts as $post)
                            <div class="card" style="margin-top: .5rem">
                                <div class="card-body p-3">
                                    <a href="{{ route('post.show', [$post->id]) }}">
                                        <h3>{{$post -> title}}</h3>
                                    </a>
                                    <blockquote class="blockquote mb-0">
                                    <p class="card-text">{{substr($post -> content,0,75) . "..."}}</p>
                                    <footer class="blockquote-footer">{{$post->user->name}}</footer>
                                    </blockquote>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection