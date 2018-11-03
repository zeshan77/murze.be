<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title') - Zeshan Khattak PHP and Laravel blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    @include('front.layouts._partials.seo')
    <link href="https://fonts.googleapis.com/css?family=Raleway:500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/front.css') }}">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script defer src="{{ mix('js/front.js') }}"></script>
    <link rel="prefetch" href="/js/highlight.js" as="script">
    <meta name="google-site-verification" content="5zEG0zsUBXWQmIGM_3FLkojPHg5o6dWIKYRH39tb83Y" />
</head>
<body>
@include('front.layouts._partials.analytics')
<div id="app" class="container mx-auto">
    <header>
        @include('front.layouts._partials.navigation')
    </header>

    <div class="flex flex-col lg:flex-row">

        <main class="lg:w-3/4 lg:mr-4">
            @include('back.layouts._partials.flashMessage')
            @yield('content')
        </main>
    </div>

    <footer class="px-4 mx-auto border-t py-6 mt-6 text-center text-sm sm:text-base">
        <a href="https://twitter.com/zeshan" target="_blank">@zeshan</a> -
        <a href="https://github.com/zeshan77" target="_blank">Github</a> -
        <a href="https://www.linkedin.com/in/zeshankhattak/" target="_blank">Linkedin</a>
    </footer>

</div>
</body>
</html>
