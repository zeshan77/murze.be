<ul class="grid">
    @foreach($projects as $project)
        <li class="mb-8 border-b-2 item mr-4">
            <a href="{{ $project->url }}" target="_blank"> {{ $project->title }}</a>
            <p>
                <i>{{ $project->my_role }}</i>
                {!! $project->description !!}
            </p>
        </li>
    @endforeach
</ul>