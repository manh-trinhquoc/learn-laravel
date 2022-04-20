{{-- Output the $id variable. --}}
<p>We're looking at event ID #{{ $id }}.</p>
<p>
    {{ $name }} has the event ID #{{ $id }}.
</p>
<p>
    {{ $name2 }} is scheduled for {{ $date }}!
</p>

<p>
    Welcome, {{ $name or "HackerPair Member" }}!
</p>