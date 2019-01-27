@extends('front.layouts.twocolumns')

@section('title', 'Home')

@section('content')
    <h1 class="pb-4 border-b">Hi,</h1>

    @include('front.me._partials.zeshan')

    <p> {!! $page->content !!} </p>

    <h2 class="mt-8 mb-6">Recent posts</h2>
    <div class="posts mb-6">
        @foreach($posts as $post)
            <div class="post pb-6">
                <div class="heading">
                    <div class="title"><a href="{{ $post->url }}">{{ $post->title }}</a></div>
                </div>
                <div class="body">
                    {!! str_limit($post->text) !!}
                </div>
            </div>
        @endforeach
    </div>

    <i class="fab fa-linkedin"></i>

@endsection