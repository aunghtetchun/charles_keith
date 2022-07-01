<h4 class="ps-3 mt-2">
    Charles & Keith</h4>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @forelse($categories as $category)
                    <li class="nav-item dropdown">
                         <a class="nav-link  p-3 text-left text-capitalize" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $category->title }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @forelse($category->subcat[0] as $sc)
                                <li><a class="dropdown-item" href="{{ route('cat.detail', $sc->slug) }}">{{ $sc->title }}</a></li>
                            @empty
                            @endforelse
                        </ul>
                    </li>
                @empty

                @endforelse
            </ul>
            <form action="{{ route('cat.search') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" placeholder="Search Post">
                    <button class="btn btn-secondary">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>


        </div>
    </div>
</nav>
