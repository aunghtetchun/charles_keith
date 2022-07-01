@extends('templates.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="">
                        <h4>Blog Posts</h4>
                    </div>
                    <div class="">
                        <form action="{{ route('blog') }}" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="keyword" placeholder="Search Post">
                                <button class="btn btn-secondary">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @forelse($posts as $post)
                <div class="col-lg-9">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4 class="card-title">{{ $post->title }}</h4>
                            <div class=" mb-3">
                                    <span class="badge bg-secondary">
                                        {{ $post->category->title }}
                                    </span>
                                <span class="badge bg-secondary">
                                        {{ $post->user->name }}
                                    </span>
                            </div>
                            <p class="text-black-50 card-text">
                                {{ $post->excerpt }}
                            </p>
                            <div class="">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0">
                                        <i class="bi bi-calendar"></i>
                                        {{ $post->created_at->format("d M Y") }}
                                    </p>
                                    <a href="" class="btn btn-sm btn-primary">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
            <div class="col-12">
                <div class=" my-3">
                    {{ $posts->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
