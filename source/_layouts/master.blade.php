<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="{{ $page->meta_description ?? $page->siteDescription }}">
    <meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}" />
    <meta property="og:description" content="{{ $page->siteDescription }}" />
    <title>{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}</title>
    <link rel="home" href="{{ $page->baseUrl }}">
    <link rel="icon" href="/favicon.png">
    <link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">
    @stack('meta')
    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.1/css/brands.css" integrity="sha384-oRjDIXtfHT9YAjxHLAbf8PsJklTJN+dl7PmnAlOTYJhNAspi+/xgU4f12vi5xGzz" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.1/css/fontawesome.css" integrity="sha384-k8n1hWo+b1vuRb6E3KATGC++lfNDnJTtJ6pS2BFF3tp/OshnO7uhzoOj/zJbGfwg" crossorigin="anonymous">
</head>

<body class="bg-gray-800 min-h-screen flex flex-col">
    <main role="main" class="py-16 flex-grow" id="app">
        @yield('body')
    </main>
    <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
    @stack('scripts')
</body>

</html>
