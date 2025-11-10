<nav id="dashboardNav">
    <a href="{{ route('book.create') }}">
        <i class="nf nf-fa-plus"></i>
        <span class="text">New Book</span>
    </a>

    @foreach ($books as $book)
        @php
            $path = Auth::user()->info->path;
        @endphp
        <a href="/book/{{ $path }}/{{ $book->hash }}">
            {{ $book->title }}
        </a>
    @endforeach
</nav>
