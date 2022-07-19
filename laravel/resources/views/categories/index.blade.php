@extends('layouts.app')

@section('content')
{{ Breadcrumbs::render() }}
<div class="row">
    <div class="col">
        <h4>{{ $title_3 }}</h4>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>State</th>
                    <th>Upcoming Events</th>
                    <th>Recently Posted</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($eventsByCategory as $event)
                <tr>
                    <td>{{ $event->category_name }}</td>
                    <td><a href="{{ route('events.show', ['event' => $event->slug]) }}">{{ $event->name }}</a></td>
                    <td><a href="{{ route('events.show', ['event' => $event->slug]) }}">{{ $event->name }}</a></td>
                </tr>
                @empty
                <tr>
                    <td>No events found!</td>
                </tr>
                @endforelse

            </tbody>
        </table>
        <div>
            {!! $eventsByCategory->links('vendor.pagination.bootstrap-4') !!}
        </div>
    </div>
</div>
@endsection
