@include('layouts.partials.errors')

<div class="status-post">
    {{ Form::open(['route' => 'statuses_path']) }}

    <div class="form-group">
        {{ Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Whats on your mind', 'rows' => 3]) }}
    </div>

    <div class="form-group status-post-submit">
        {{ Form::submit('Post Status', ['class' => 'btn btn-default btn-xs']) }}
    </div>
    {{ Form::close() }}
</div>