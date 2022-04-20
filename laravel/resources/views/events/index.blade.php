<img src="/img/logo.png" />
<img src="{{ asset('img/logo.png') }}" />
<!-- Using the LaravelCollective/html package -->
{!! HTML::image('img/logo.png', 'HackerPair logo') !!}

<!-- Using the LaravelCollective/html package -->
{!! HTML::style('css/app.min.css') !!}
{!! HTML::script('js/jquery.min.js') !!}
{!! HTML::script('js/app.js') !!}
{!! HTML::style('css/app.css') !!}

<ul>
    @foreach ($events as $event)
    <li>{{ $event }}</li>
    @endforeach
</ul>


<ul>
    @forelse ($events as $event)
    <li>{{ $event }}</li>
    @empty
    <li>No events available.</li>
    @endforelse
</ul>

<ul>
    @foreach ($events as $event)
    <li>
        {{ $event }}
        @if (strpos($event, 'Laravel') !== false)
        (sweet framework!)
        @elseif (strpos($event, 'Raspberry') !== false)
        (love me some Raspberry Pi!)
        @else
        (don't know much about this one!)
        @endif
    </li>
    @endforeach
</ul>

<table>
    @foreach ($events as $event)

    @include('partials._row', ['event' => $event])

    @endforeach
</table>