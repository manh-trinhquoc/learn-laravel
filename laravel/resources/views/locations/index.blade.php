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
                    <th>Upcoming Events</th>
                    <th>Recently Posted</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
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
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection
