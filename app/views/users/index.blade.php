@extends('layouts.default')

@section('content')
    <h3>All Users</h3>

    @foreach($users->chunk(4) as $usersSet)
        <div class="row users ">
            @foreach($usersSet as $user)
                <div class="col-md-3 user-block">
                    @include('users.partials.avatar',['size' => 70])
                    <h4 class="user-block-username">
                        {{ link_to_route('profile_path', $user->username, $user->username) }}
                    </h4>
                </div>
            @endforeach
        </div>
    @endforeach

    {{ $users->links() }}
@stop



