@extends('layouts.app')

@section('content')
<img src="/img/logo.png" />
<img src="{{ asset('img/logo.png') }}" />
<!-- Using the LaravelCollective/html package -->
{!! HTML::image('img/logo.png', 'HackerPair logo') !!}

<!-- Using the LaravelCollective/html package -->
{!! HTML::style('css/app.min.css') !!}
{!! HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/app.js') !!}
{!! HTML::style('css/app.css') !!}


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
