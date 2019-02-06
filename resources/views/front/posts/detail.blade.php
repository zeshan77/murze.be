@extends('front.layouts.master')

@section('title', $post->formatted_title )

@section('content')

    @auth
        <div class="pb-4">
            <a class="button" target="_blank" href="{{ action('Back\PostsController@edit', $post->slug) }}">Edit</a>
        </div>
    @endauth

    <h1>{{ $post->formatted_title }}</h1>

    <div class="text-grey-darker text-sm pb-6 border-b text-grey">
        Posted on <time datetime="{{ $post->publish_date->format(DateTime::ATOM) }}">{{ $post->publish_date }}</time> | {{ $post->author }}
    </div>

    <div class="pt-4 post-content">
        {!! $post->text !!}
    </div>

    {{--<div class="pt-4">--}}
        {{--@include('front.posts._partials.tags')--}}
    {{--</div>--}}

    <div class="pt-4">
        @include('front.posts._partials.disqus')
    </div>

@endsection

@section('seo')
    <meta property="og:title" content="{{ $post->title }} | zeshankhattak.com"/>
    <meta property="og:description" content="{{ $post->excerpt }}"/>

    @foreach($post->tags as $tag)
        <meta property="article:tag" content="{{ $tag->name }}"/>
    @endforeach
    <meta property="article:published_time" content="{{ $post->publish_date->toIso8601String() }}"/>
    <meta property="og:updated_time" content="{{ $post->updated_at->toIso8601String() }}"/>

    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:description" content="{{ $post->excerpt }}"/>
    <meta name="twitter:title" content="{{ $post->title }} | murze.be"/>
    <meta name="twitter:site" content="@zeshan"/>
    <meta name="twitter:image" content="https://zeshankhattak.com/images/zeshan.jpg"/>
    <meta name="twitter:creator" content="@zeshan"/>
@endsection
