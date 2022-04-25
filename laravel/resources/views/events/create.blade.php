@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col">

        {!! Form::open(['route' => 'events.store'], ['class' => 'form']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Event Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, [
            'class' => 'form-control input-lg',
            'placeholder' => 'PHP Hacking and Pizza' ])
            !!}
        </div>
        <div class="form-group">
            {!! Form::label('max_attendees', 'Maximum Number of Attendees',
            ['class' => 'control-label'])
            !!}
            {!! Form::select('max_attendees', [2,3,4,5], null,
            [
            'placeholder' => 'Maximum Number of Attendees',
            'class' => 'form-control input-lg'
            ])
            !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', "Description",
            ['class' => 'control-label'])
            !!}
            {!! Form::textarea('description', null,
            [
            'class' => 'form-control input-lg',
            'placeholder' => 'Describe the event'
            ])
            !!}
        </div>

        <div class="form-group">
            {!! Form::label('state_id', "State", ['class' => 'control-label']) !!}
            {!! Form::select('state_id', \App\Models\State::orderBy('name', 'asc')->pluck('name', 'id'), null, ['class' => 'form-control input-lg']); !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add Event',
            [
            'class' => 'btn btn-info btn-lg',
            'style' => 'width: 100%'
            ])
            !!}
        </div>
        {!! Form::close() !!}
    </div>


</div>


@endsection