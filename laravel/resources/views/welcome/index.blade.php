@extends('layouts.app')

@section('content')

<h2>{{ $content_title }}</h2>

@if (count($events) === 1)
I have one event!
@elseif (count($events) > 1)
I have multiple events!
@else
<p> No events found.</p>
@endif

@endsection
