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

<body class="bg-gray-100 min-h-screen flex flex-col">
    <header>
        <div class="h-2 bg-orange-500"></div>
        @if( $page->cover_image )
        <div class="relative bg-cover cover-image" style="background-image: url('{{ $page->cover_image }}')">
            <svg class="absolute bottom-0 left-0 h-24 min-w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                <polygon fill="#F7FAFC" points="-30,-145 -120,120 100,200" />
            </svg>
        </div>
        @else
        <div class="relative bg-cover cover-image" style="background-image: url('/assets/images/head-jasonk.jpg')">
            <div class="p-4 pt-24 mx-auto text-right sm:-mr-1 md:-mr-36 sm:max-w-xs md:max-w-lg xl:max-w-3xl">
                <div class="flex flex-col font-mont">
                    <span class="text-xl font-semibold leading-snug text-gray-800 xl:text-gray-700">
                        The Online Space of
                        <span class="underline">Developer</span>,
                        <span class="underline">Sysadmin</span> at
                        <a href="https://preciousmemories.photography" class="text-orange-400 underline" rel="noreferrer" target="_blank" title="Precious Memories Photography website">Precious Memories Photography</a>,
                        <a href="https://laravel.com" class="text-orange-400 underline" rel="noreferrer" target="_blank" title="Offical Laravel website">Laravel</a>
                        developer, blogger, and
                        <a href="https://vuejs.org" class="text-orange-400 underline" rel="noreferrer" target="_blank" title="Offical Vue.js Website">Vue.js</a>
                        user,
                    </span>
                    <span class="mt-1 text-3xl text-orange-400 underline lg:text-4xl">Jason Kenyon.</span>
                </div>
            </div>
            <svg class="absolute bottom-0 left-0 h-24 min-w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                <polygon fill="#F7FAFC" points="-30,-145 -120,120 100,200" />
            </svg>
        </div>
        @endif
    </header>
    <!-- Nav -->
    <div class="max-w-8xl px-4 lg:px-8 mt-8 flex justify-end">
        @include('_nav.menu')
        @include('_nav.menu-toggle')
    </div>

    @include('_nav.menu-responsive')
    <!-- /Nav -->
    <main role="main" class="py-16 flex-grow" id="app">
        @yield('body')
    </main>
    <footer class="bg-gray-100 h-auto p-2 border-t-4 border-orange-200 text-gray-900">
        <div class="flex flex-wrap-reverse justify-around md:justify-between">
            <div class="md:ml-24 flex items-center font-thin text-sm">&copy; Jason Kenyon - 2019 - {{ date('Y') }}</div>
            <div class="mr-0 mb-4 md:mb-0 md:mr-24 text-2xl flex items-center">
                <a href="https://github.com/jasonkenyon" target="_blank" rel="noreferrer" title="Jason Kenyon, on github"><i class="fab fa-github mx-4 text-gray-500"></i></a>
                <a href="https://twitter.com/jasonkenyon_" target="_blank" rel="noreferrer" title="Jason Kenyon, on twitter"><i class="fab fa-twitter mx-4 text-gray-500"></i></a>
                <a href="https://www.linkedin.com/in/jason-kenyon-995202169/" target="_blank" rel="noreferrer" title="Jason Kenyon, on LinkedIn"><i class="fab fa-linkedin mx-4 text-gray-500"></i></a>
            </div>
        </div>
        </div>
    </footer>
    <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
    @stack('scripts')
</body>

</html>
