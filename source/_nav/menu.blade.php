<nav class="hidden lg:flex items-center text-lg">
    <a title="{{ $page->siteName }} Home" href="/"
        class="text-orange-500 hover:text-orange-600 flex items-center justify-end uppercase mr-4 {{ $page->isActive('/') ? 'underline' : '' }}">
        Home
    </a>
    <a title="{{ $page->siteName }} Blog" href="/blog"
        class="text-orange-500 hover:text-orange-600 flex items-center justify-end uppercase mr-4 {{ $page->isActive('/blog') ? 'underline' : '' }}">
        Blog
    </a>
    <a title="{{ $page->siteName }} Uses" href="/uses"
        class="text-orange-500 hover:text-orange-600 flex items-center justify-end uppercase {{ $page->isActive('/uses') ? 'underline' : '' }}">
        Uses
    </a>
</nav>
