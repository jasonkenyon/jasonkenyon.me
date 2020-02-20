@extends('_layouts.master')
@push('meta')
    <meta property="og:title" content="{{ $page->title }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}"/>
@endpush
@section('body')
    <div class="container px-4 mx-auto">
        <h1 class="text-4xl font-bold text-orange-600 underline uppercase font-chivo">
            {{ $page->title }}</h1>
        <div class="text-base italic text-gray-700">{{ $page->author }} • {{ date('F j, Y', $page->date) }}</div>
        <div class="pb-4 mb-12" v-pre>
            @yield('content')
            @if ($page->categories)
                @foreach ($page->categories as $i => $category)
                    <a href="{{ '/blog/categories/' . $category }}" title="View posts in {{ $category }}"
                       class="inline-block px-4 py-1 my-4 mr-2 text-xs text-orange-800 uppercase bg-orange-200 border border-orange-300 rounded-lg">{{ $category }}</a>
                @endforeach
            @endif
        </div>
    </div>

    @if($page->getNext() || $page->getPrevious())
        <div class="min-w-full px-4 bg-circuits">
            <nav class="container flex justify-between mx-auto text-sm md:text-base">
                <div class="my-16">
                    @if ($next = $page->getNext())
                        <div class="mb-2 text-base font-thin uppercase">
                            &LeftArrow; Previous Post
                        </div>
                        <a class="text-xl" href="{{ $next->getUrl() }}" title="Older Post: {{ $next->title }}">
                            {{ $next->title }}
                        </a>
                    @endif
                </div>
                <div class="my-16">
                    @if ($previous = $page->getPrevious())
                        <div class="mb-2 text-base font-thin uppercase">
                            Next Post &RightArrow;
                        </div>
                        <a class="text-xl" href="{{ $previous->getUrl() }}" title="Newer Post: {{ $previous->title }}">
                            {{ $previous->title }}
                        </a>
                    @endif
                </div>
            </nav>
        </div>
    @endif
@endsection