@extends('back.layouts.master')

@section('content')

    <div class="bg-white rounded border-2 max-w-xl mx-auto flex-1 my-8 pb-4">
        <div class="bg-grey-lighter mb-2 px-8 py-2 text-grey-darker font-bold">
            <h1 class="p-0 text-grey-darker">New Project</h1>
        </div>
        <form class="mx-8" action="{{ action('Back\ProjectController@store') }}" method="POST">
            @include('back.projects._partials.form', ['submitText' => 'Create'])
        </form>
    </div>

@endsection