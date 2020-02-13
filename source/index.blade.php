@extends('_layouts.master')
@section('body')
<div class="container mx-auto my-12 px-4">
    <h2 class="font-mont font-bold text-3xl underline text-center text-gray-800 mb-6">
        Active Projects Overview
    </h2>
    <div class="flex flex-wrap {{ $projects->count() > 1 ? 'justify-between' : 'justify-start' }}">
        @foreach($projects->where('active', true) as $project)
        <div class="max-w-xl lg:max-w-sm mb-10 text-gray-600">
            <div class="text-gray-800 font-bold text-lg pb-1"> {{ $project->projectName }} </div>
            <div class="text-gray-700 text-base leading-relaxed">
                {!! $project !!}
            </div>
            <hr />
            <div class="flex justify-between items-center text-sm pt-2">
                @if($project->opensource === false)
                <span class="text-orange-600">A Closed-source Project</span>
                @else
                <span class="text-orange-600">An Open-source Project</span>
                @endif
                @if($project->github != null)
                <div>
                    <a href="{{ $project->github }}" title="{{ $project->projectName }} Git Repo" target="_blank" rel="noopener"><i class="fab fa-github text-gray-500"> Source</i></a>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="min-w-full hero-pattern px-4 py-8">
    <div class="max-w-6xl mx-auto justify-center">
        <div class="flex justify-center">
            <v-lazy-image src="/assets/images/jason.jpeg" class="rounded-full h-32 w-32 shadow-lg border-orange-200 border-2" alt="Picture of Jason Kenyon" />
        </div>
        <h1 class="font-mont font-bold text-3xl underline text-center text-gray-800">
            About Jason Kenyon
        </h1>
        <div class="flex flex-wrap items-center justify-center p-6">
            <div class="text-gray-700 leading-relaxed text-gray-700 text-base">
                <p>
                    There is a chance that you don't know me, and well to be upfront
                    regarding it that is okay. I've never been that big into
                    contributing or providing anything that I have made open source.
                    It's always just been for friends, family and personal reasons.
                    Though I'm looking to change that and get into Open Source and
                    provide resources where I can.
                </p>
                <p>
                    I'm a Sys-admin, developer, and wannabe designer... Living in
                    Newport News, Virginia. I work with my wife on her website and
                    business needs at Precious Memories Photography; on top of that, I
                    also work as a supervisor for a hosting company in Virginia Beach,
                    Virginia.
                </p>
                <p>
                    You can contact me on Twitter at
                    <a href="https://twitter.com/jasonkenyon_" target="_blank" rel="noreferrer" title="Jason Kenyon, on twitter" class="text-orange-600 hover:text-gray-600">@jasonkenyon_</a>
                    and even check out my Github account at
                    <a href="https://github.com/jasonkenyon" target="_blank" rel="noreferrer" title="Jason Kenyon, on github" class="text-orange-600 hover:text-gray-600">@jasonkenyon</a>, any questions feel free to reach out on twitter, give me a
                    follow, I'm always happy to have a chat!
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container mx-auto my-12 px-4">
    <h2 class="font-monts font-bold text-3xl underline text-center text-gray-800 mb-6">
        Latest Blog Posts
    </h2>
    <div class="container flex flex-wrap {{ $posts->count() > 1 ? 'justify-around' : 'justify-start' }}">
        @foreach($posts->take(4) as $post)
        <div class="max-w-xl lg:max-w-sm xl:max-w-lg rounded overflow-hidden shadow mb-8 hover:shadow-lg border-b-8 border-orange-200 md:mx-6 lg:mx-6 xl:mx-6">
            <a href="{{ $post->getUrl() }}">
                <v-lazy-image src="{{ $post->cover_image }}" class="w-full h-56" alt="{{ $post->title }}" />
            </a>
            <div class="p-4 h-full">
                <div class="font-bold font-chivo text-xl uppercase text-orange-600">
                    <a href="{{ $post->getUrl() }}">{{ $post->title }}</a>
                </div>
                <div class="text-sm text-gray-700 italic">
                    {{ $post->getDate()->format('F j, Y') }}
                </div>
                <div class="leading-relaxed text-gray-700 text-base mt-2 flex-grow">
                    {!! $post->getExcerpt(500) !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop