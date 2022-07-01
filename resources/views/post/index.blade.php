@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    @trash
                    <li class="breadcrumb-item">
                        <a href="{{ route('post.index') }}">Post</a>
                    </li>
                    @endtrash
                    <li class="breadcrumb-item active" aria-current="page">@trash Deleted @endtrash Post List</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        @trash Deleted @endtrash Post list
                    </h4>
                    <hr>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="">
                            @search
                                <span>Search By "{{ request('keyword') }}"</span>
                                <a href="{{ route('post.index') }}" class="ms-2 text-danger">
                                    <i class="bi bi-trash"></i>
                                </a>
                            @endsearch
                        </div>
                        <div class="">
                            <form action="{{ route('post.index') }}" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" placeholder="Search Post">
                                    <button class="btn btn-secondary">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table align-middle">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="w-60">Title</th>
                            <th>Controls</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td class="fw-bold">{{ $post->id }}</td>
                                <td>
                                    {{ str()->words($post->title,5) }}
                                    <div class="">
                                        <span class="badge bg-dark-soft super-small">
                                            <i class="bi bi-person me-1"></i>
                                            {{ $post->user->name }}
                                        </span>
                                        <span class="badge bg-dark-soft super-small">
                                            <i class="bi bi-card-list me-1"></i>
                                            {{ $post->category->title }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <form action="{{ route('post.destroy',$post->id) }}" id="delFrom{{ $post->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        @trash
                                            <input type="hidden" name="force_delete" value="1">
                                        @endtrash
                                    </form>
                                    <div class="btn-group btn-group-sm">
                                        @trash
                                            <a
                                                class="btn btn-sm btn-outline-secondary"
                                                onclick="return confirm('Are U sure to Restore ?')"
                                                href="{{ route('post.show',[$post->id,'mode'=>'restore']) }}">
                                                <i class="bi bi-arrow-clockwise"></i>
                                            </a>
                                        @else
                                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('post.edit',$post->id) }}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-secondary">
                                            <i class="bi bi-cursor"></i>
                                        </button>
                                        @endtrash
                                        <button
                                            form="delFrom{{ $post->id }}"
                                            onclick="return confirm('Are U sure to Delete ?')"
                                            class="btn btn-sm btn-outline-secondary">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <p class="date mb-0">
                                        <i class="bi bi-calendar me-1"></i>
                                        {{ $post->created_at->format("d M Y") }}
                                    </p>
                                    <p class="time mb-0">
                                        <i class="bi bi-clock me-1"></i>
                                        {{ $post->created_at->format("h:i A") }}
                                    </p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">There is no Post</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="">
                        {{ $posts->onEachSide(1)->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
