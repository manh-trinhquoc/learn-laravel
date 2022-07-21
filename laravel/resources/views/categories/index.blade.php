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
                @forelse ($recentlyPostedItems as $key => $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td><a href="{{ route('events.show', ['event' => $upcommingItems->get($key)->event_slug]) }}">{{ $upcommingItems->get($key)->event_name }}</a></td>
                    <td><a href="{{ route('events.show', ['event' => $category->event_slug]) }}">{{ $category->event_name }}</a></td>
                </tr>
                @empty
                <tr>
                    <td>No events found!</td>
                </tr>
                @endforelse

            </tbody>
        </table>
        <div>
            {!! $recentlyPostedEvents->links('vendor.pagination.bootstrap-4') !!}
        </div>
    </div>
</div>
@endsection
