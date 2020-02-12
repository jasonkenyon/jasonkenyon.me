@extends('_layouts.master')
@push('meta')
<meta property="og:title" content="{{ $page->title }}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ $page->getUrl() }}" />
<meta property="og:description" content="{{ $page->description }}" />
@endpush
@section('body')
<div class="container mx-auto px-4">
    <h1 class="text-4xl underline font-bold font-chivo uppercase text-orange-600">
        {{ $page->title }}</h1>
    <div class="text-base text-gray-700 italic">{{ $page->author }} • {{ date('F j, Y', $page->date) }}</div>
    <div class="mb-12 pb-4" v-pre>
        @yield('content')
        @if ($page->categories)
        @foreach ($page->categories as $i => $category)
        <a href="{{ '/blog/categories/' . $category }}" title="View posts in {{ $category }}" class="inline-block rounded-lg text-xs text-orange-500 border border-orange-300 py-1 px-4 bg-orange-200 my-4 mr-2 uppercase">{{ $category }}</a>
        @endforeach
        @endif
    </div>
</div>

    @if($page->getNext() || $page->getPrevious())
    <div class="min-w-full bg-circuits px-4">
        <nav class="flex container mx-auto justify-between text-sm md:text-base">
            <div class="my-16">
                @if ($next = $page->getNext())
                <div class="uppercase text-base font-thin mb-2">
                    &LeftArrow; Previous Post
                </div>
                <a class="text-xl" href="{{ $next->getUrl() }}" title="Older Post: {{ $next->title }}">
                    {{ $next->title }}
                </a>
                @endif
            </div>
            <div class="my-16">
                @if ($previous = $page->getPrevious())
                <div class="uppercase text-base font-thin mb-2">
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