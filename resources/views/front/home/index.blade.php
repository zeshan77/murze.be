@extends('front.layouts.twocolumns')

@section('title', 'Home')

@section('content')
    <h1 class="pb-4 border-b">Hi,</h1>

    @include('front.me._partials.zeshan')

    <p> {!! $page->content !!} </p>

    <i class="fab fa-linkedin"></i>

@endsection