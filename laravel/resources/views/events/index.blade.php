@extends('layouts.app')

@section('content')
<h1>Events</h1>
<h3>
    {{ session('message') }}
</h3>
<ul>
    @forelse ($events as $event)
    <li> <a href="{{ route('events.show', ['event' => $event->slug]) }}">{{ $event->name }}</a></li>
    @empty
    <li>No events found!</li>
    @endforelse
</ul>

{!! $events->links('vendor.pagination.simple-bootstrap-4') !!}

@endsection
