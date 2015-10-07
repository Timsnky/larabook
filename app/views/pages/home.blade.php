@extends('layouts.default')

@section('content')

    <div class="jumbotron">
        <h1>Welcome to Larabook</h1>
        <p>Welcome to the premier place to talk about laravel with others. Why dont you sign up</p>

        @if (! $currentUser)
            <p>
              {{ link_to_route('register_path', 'Sign Up', null, ['class' => 'btn btn-lg btn-primary']) }}
            </p>
        @endif
    </div>
@stop