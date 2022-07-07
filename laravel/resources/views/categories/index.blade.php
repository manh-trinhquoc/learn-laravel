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
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection
