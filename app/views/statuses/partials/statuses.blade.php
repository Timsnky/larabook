@forelse($statuses as $status)
    @include('statuses.partials.status')
@empty
    <p>The user hasn't posted a status</p>
@endforelse