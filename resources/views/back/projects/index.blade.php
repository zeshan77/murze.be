@extends('back.layouts.master')

@section('content')

    <div class="bg-white rounded border-2 max-w-xl mx-auto flex-1 my-8 pb-4">
        <div class="flex justify-between items-center bg-grey-lighter mb-2 px-8 py-2 text-grey-darker font-bold">
            <h1 class="p-0 text-grey-darker">Projects</h1>
            <a href="{{ action('Back\ProjectController@create') }}" class="bg-blue text-sm text-white hover:text-grey-light py-2 px-3 font-medium rounded-lg">
                New Project
            </a>
        </div>

        @foreach($projects as $project)
            <div class="flex justify-between items-start px-6 py-2 border-b border-grey-lighter">
                <div>
                    <div>
                        <a href="{{ action('Back\ProjectController@edit', $project->id) }}">{{ $project->title }}</a>
                    </div>
                    <div>
                        <a href="{{ $project->url }}">{{ $project->url }}</a>
                    </div>
                    <div>{{ $project->my_role }}</div>
                    <div>{{ $project->tools_used }}</div>

                    <div class="text-xs text-grey font-medium">
                        {{ $project->published_at }}
                    </div>
                    <div>{!! $project->description !!}</div>
                </div>
                <div class="flex justify-between items-center">
                    <div class="text-sm my-1 px-2 border-r {{ $project->published_at ? 'text-green' : 'text-orange' }}">{{ $project->published_at ? 'Published' : 'Draft' }}</div>
                    <div class="text-sm my-1 px-2">@include('back._partials.deleteButton', ['url' => action('Back\ProjectController@destroy', [$project->id])])</div>
                </div>
            </div>
        @endforeach
    </div>

@endsection