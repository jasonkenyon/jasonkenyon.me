<nav id="js-nav-menu" class="nav-menu hidden flex lg:hidden">
    <ul class="my-0 flex-end">
        <li class="pl-4">
            <a
                    title="{{ $page->siteName }} Home"
                    href="/blog"
                    class="nav-menu__item hover:text-orange-500 {{ $page->isActive('/') ? 'active text-orange' : '' }}"
            >Home</a>
        </li>
        <li class="pl-4">
            <a
                    title="{{ $page->siteName }} Blog"
                    href="/blog"
                    class="nav-menu__item hover:text-orange-500 {{ $page->isActive('/blog') ? 'active text-orange' : '' }}"
            >Blog</a>
        </li>
        <li class="pl-4">
            <a
                    title="{{ $page->siteName }} Uses"
                    href="/uses"
                    class="nav-menu__item hover:text-orange-500 {{ $page->isActive('/uses') ? 'active text-orange' : '' }}"
            >Uses</a>
        </li>
    </ul>
</nav>
