@extends('layouts.app')

@section('content')
<h1>Events</h1>
<h3>
    {{ session('message') }}
</h3>
<ol>
    @forelse ($events as $event)
    <li> <a href="{{ route('events.show', ['event' => $event->slug]) }}">{{ $event->name }}</a></li>
    @empty
    <li>No events found!</li>
    @endforelse
</ol>

{!! $events->links('vendor.pagination.bootstrap-4') !!}

@endsection
