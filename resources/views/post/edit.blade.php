@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('post.index') }}">Post</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Update Post</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Post</h4>
                    <hr>
                    <form action="{{ route('post.update',$post->id) }}" enctype="multipart/form-data" class="mb-3" method="post">
                        @csrf
                        @method("put")
                        <div class="mb-3">
                            <label class="form-label" for="title">Post Title</label>
                            <input
                                type="text"
                                class="form-control @error('title') is-invalid @enderror"
                                name="title"
                                id="title"
                                value="{{ old('title',$post->title) }}">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="category">Select Category</label>
                            <select
                                type="text"
                                class="form-select @error('category') is-invalid @enderror"
                                name="category"
                                id="category">
                                @forelse($categories as $category)
                                    @if(isset($category->parent_id))
                                        <option value="{{ $category->id }}" {{ $category->id === $post->category_id ? 'selected':'' }}>{{ $category->title }}</option>
                                    @else
                                    @endif
                                @empty
                                @endforelse
                            </select>
                            @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 d-flex flex-wrap justify-content-between">
                            <div class="col-12 col-md-6 col-lg-6 pe-1">
                                <label class="form-label" for="price">Price</label>
                                <input
                                    type="text"
                                    class="form-control @error('price') is-invalid @enderror"
                                    name="price"
                                    id="price"
                                    value="{{ old('price',$post->price) }}">
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 ps-1">
                                <label class="form-label" for="category">Sale Price</label>
                                <input
                                    type="text"
                                    class="form-control @error('sale_price')is-invalid @enderror"
                                    name="sale_price"
                                    id="sale_price"
                                    value="{{ old('sale_price',$post->sale_price) }}"
                                >
                                @error('sale_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 d-flex flex-wrap justify-content-between">
                            <div class="col-12 col-md-6 col-lg-6 pe-1">
                                <label class="form-label" for="price">Color Name</label>
                                <input
                                    type="text"
                                    class="form-control @error('color_name') is-invalid @enderror"
                                    name="color_name"
                                    id="color_name"
                                    value="{{ old('color_name',$post->color_name) }}">
                                @error('color_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 ps-1">
                                <label class="form-label" for="category">Color Photo</label>
                                <input
                                    type="file"
                                    class="form-control @error('color_photo')is-invalid @enderror"
                                    name="color_photo"
                                    id="color_photo"
                                    value="{{ old('color_photo',$post->color_photo) }}"
                                >
                                @error('color_photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">Post Description</label>
                            <textarea
                                type="text"
                                class="form-control @error('description') is-invalid @enderror"
                                name="description"
                                id="description"
                                rows="10">{{ old('description',$post->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="detail">Post Detail</label>
                            <textarea
                                type="text"
                                class="form-control @error('detail') is-invalid @enderror"
                                name="detail"
                                id="detail"
                                rows="10">{{ old('detail',$post->detail) }}</textarea>
                            @error('detail')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <button class="btn btn-primary">
                                <i class="bi bi-upload me-1"></i>
                                Update Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
