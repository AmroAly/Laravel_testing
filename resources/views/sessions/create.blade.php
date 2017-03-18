@extends('layout')

@section('content')
    <h1>Sign In</h1>

    <form action="/login" method="post">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Your email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Your password">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Log In</button>
        </div>

        @include('layouts.errors')
    </form>

@endsection
