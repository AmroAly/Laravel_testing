@extends('layout')

@section('content')
    <div class="col-ms-8 blog-main">
        <h1>create a post</h1>
        <hr>

        <form action="/posts" method="post">

            {{ csrf_field() }}

          <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>

          <div class="form-group">
            <label for="body">Post Body</label>
            <textarea name="body" id="body" class="form-control" rows="3" cols="80"></textarea>
          </div>

          @include('layouts.errors')

          <button type="submit" class="btn btn-primary">Publish</button>
        </form>

    </div>
@endsection
