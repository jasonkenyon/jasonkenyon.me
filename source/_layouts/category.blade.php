@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}"/>
@endpush

@section('body')
    <div class="container px-4 mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 underline font-mont">{{ $page->title }}</h1>

        <div class="pb-10 mb-6 text-lg border-b border-orange-200">
            @yield('content')
        </div>

        @foreach ($page->posts($posts) as $post)
            @include('_components.post-preview-inline')

            @if (! $loop->last)
                <hr class="w-full mt-2 mb-6 border-b">
            @endif
        @endforeach
    </div>
@stop
