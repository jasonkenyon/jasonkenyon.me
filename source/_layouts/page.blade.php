@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}"/>
@endpush

@section('body')
    <div class="container px-4 mx-auto">
        @yield('content')
    </div>
@stop