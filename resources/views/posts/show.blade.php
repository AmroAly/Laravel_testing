@extends('layout')

@section('content')
    <h1>{{ $post->title }}</h1>

    @if (count($tags))
        <ul>
            @foreach ($tags as $tag)
                <a href="posts/tags/{{ $tag }}">
                    <li>{{ $tag }}</li>
                </a>
            @endforeach
        </ul>
    @endif


    {{ $post->body }}

    <hr>

    <div class="comments">
        <h3>Comments</h3>
        <ul class="list-group">
            @foreach ($post->comments as $comment)
                <li class="list-group-item">
                    <strong>
                        {{ $comment->created_at->diffForHumans() }} &nbsp;
                    </strong>
                    {{ $comment->body }}
                </li>
            @endforeach
        </ul>
    </div>



    {{-- Add a comment --}}
    <hr>
    <div class="card">
        <div class="card-block">
            <form  action="/posts/{{$post->id}}/comments" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" placeholder="Your comment here" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
            @include('layouts.errors')
        </div>
    </div>


@endsection
