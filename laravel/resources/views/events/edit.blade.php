@extends('layouts.app')

@section('content')
<h1>
    Edit event
</h1>
<h3>
    {{ session('message') }}
</h3>

{!! Form::model($event,
[
'route' => ['events.update', $event->slug],
'class' => 'form',
'method' => 'put'
]) !!}

<div class="form-group">
    {!! Form::label('name', 'Event Name') !!}
    {!! Form::text('name', null,
    ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Event Description') !!}
    {!! Form::textarea('description', null,
    ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Update Event', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

{!! Form::open(
[
'route' => ['events.destroy', $event],
'method' => 'delete'
]) !!}
{!! Form::submit('Delete Event', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
@endsection
