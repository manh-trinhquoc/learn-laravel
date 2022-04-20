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