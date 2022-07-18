@extends('layouts.app')

@section('content')
{{ Breadcrumbs::render() }}
<div class="row">
    <div class="col-md-6">
        <h4>{{ $title_3 }}</h4>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>State</th>
                    <th>Events</th>
                    <th>Start Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($eventsByState as $event)
                <tr>
                    <td>{{ $event->state_name }}</td>
                    <td><a href="{{ route('events.show', ['event' => $event->slug]) }}">{{ $event->name }}</a></td>
                    <td>{{ $event->started_at->format('D M/d/Y H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td>No events found!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {!! $eventsByState->links('vendor.pagination.bootstrap-4') !!}
        </div>
    </div>
    <div class="col-md-6">
        <h4>{{ $title_4 }}</h4>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>City</th>
                    <th>State</th>
                    <th>Upcoming Events</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($eventsByCity as $event)
                <tr>
                    <td>{{ $event->city }}</td>
                    <td>{{ $event->state_name }}</td>
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
            {!! $eventsByCity->links('vendor.pagination.bootstrap-4') !!}
        </div>
    </div>
</div>
@endsection
