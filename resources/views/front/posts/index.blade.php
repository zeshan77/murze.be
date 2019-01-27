@extends('front.layouts.master')

@section('title', 'About Me')

@section('content')

    <h1>Posts</h1>

    <div class="posts">
        @foreach($posts as $post)
            <div class="post mb-6">
                <div class="heading flex">
                    <div class="title"><a href="{{ $post->url }}">{{ $post->title }}</a></div>
                </div>
                <div class="description">{!! str_limit($post->text) !!}</div>
            </div>
        @endforeach

    </div>

@endsection