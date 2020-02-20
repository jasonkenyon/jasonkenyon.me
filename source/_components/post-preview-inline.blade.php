<div class="flex flex-col mb-4">
    <p class="text-gray-700 font-medium my-2">
        {{ $post->getDate()->format('F j, Y') }}
    </p>

    <h2 class="text-3xl  mt-0">
        <a
                href="{{ $post->getUrl() }}"
                title="Read more - {{ $post->title }}"
                class="font-extrabold font-bold font-chivo text-orange-600"
        >{{ $post->title }}</a>
    </h2>

    <p class="mb-4 mt-0">{!! $post->getExcerpt(500) !!}</p>

    <a
            href="{{ $post->getUrl() }}"
            title="Read more - {{ $post->title }}"
            class="font-semibold tracking-wide mb-2"
    >Continue Reading</a>
</div>
