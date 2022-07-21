@extends('layouts.app')

@section('content')

<h1>{{ $event->name }}</h1>

<h2>Description</h2>
<p>
    {{ $event->description }}
</p>

<table>
    <thead>
        <tr>
            <th colspan="2" style="text-align: center;">Event info</th>
        </tr>
        <tr>
            <th>Field Name</th>
            <th>Content</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>ID: </td>
            <td>{{ $event->id }}</td>
        </tr>
        <tr>
            <td>Category: </td>
            <td>{{ $event->category->name }}</td>
        </tr>
        <tr>
            <td>User: </td>
            <td>
                <table>
                    <tr>
                        <td> ID: </td>
                        <td>{{ $event->user->id }}</td>
                    </tr>
                    <tr>
                        <td>Name: </td>
                        <td>{{ $event->user->first_name . ' ' . $event->user->last_name }}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{{ $event->user->email }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>Max attendees: </td>
            <td>{{ $event->max_attendees }}</td>
        </tr>
        <tr>
            <td>Venue: </td>
            <td>{{ $event->venue }}</td>
        </tr>
        <tr>
            <td>City: </td>
            <td>{{ $event->city }}</td>
        </tr>
        <tr>
            <td>State: </td>
            <td>{{ $event->state->name }}</td>
        </tr>
        <tr>
            <td>Zip: </td>
            <td>{{ $event->zip }}</td>
        </tr>
        <tr>
            <td>Start at: </td>
            <td>{{ $event->started_at }}</td>
        </tr>
    </tbody>
</table>

<p>
    {{ link_to_route('events.edit', 'Edit Event', ['event' => $event])}}

</p>


<table>
    <thead>
        <tr>
            <th colspan="2" style="text-align: center;">Comment section</th>
        </tr>
        <tr>
            <th>User</th>
            <th>Comment</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <p>{{ $event->comments }}</p>
                <p>{{ $event->comment }}</p>
                <p>{{ $event->users }}</p>
                <p>TODO: comments</p>
            </td>
        </tr>
    </tbody>
</table>

@endsection
