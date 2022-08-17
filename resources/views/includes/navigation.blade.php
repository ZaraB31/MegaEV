<nav>
    <ul>
        <a href="/dashboard"><li>Overview</li></a>
        <a href="/admin/brands"><li>Brands</li></a>
        <a href="/admin/products"><li>Products</li></a>
        <a href="/admin/caseStudies"><li>Case Studies</li></a>
        <a href="/admin/articles"><li>Articles</li></a>
        <a href="/admin/tags"><li>Article Tags</li></a>
        <a href="/admin/enquiries"><li>Enquiries</li></a>
        <a href="/admin/gallery"><li>Gallery</li></a>
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <li>Logout</li>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>
</nav>