@extends ('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            @include('statuses.partials.publish_status_form')

            @include('statuses.partials.statuses')
        </div>
    </div>
@stop
