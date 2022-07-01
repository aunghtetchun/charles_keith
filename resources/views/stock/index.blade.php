@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Stock</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Stock</h4>
                    <hr>
                    <form action="{{ route('stock.store') }}" class="mb-3" method="post">
                        @csrf
                        <div class="row g-2 align-items-start">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="parent_stock">Select Post</label>
                                <select
                                    type="text"
                                    class="form-select @error('post') is-invalid @enderror"
                                    name="post"
                                    id="post">
                                    <option value="" selected disabled>Select Post</option>
                                    @forelse($posts as $post)
                                        <option value="{{ $post->id }}">{{ $post->title }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('post')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-6 d-flex flex-wrap">
                                <div class="col-12 col-md-6 col-lg-6 pe-1">
                                    <label class="form-label" for="size">Size</label>
                                    <input
                                        type="text"
                                        class="form-control @error('size') is-invalid @enderror"
                                        name="size"
                                        value="{{ old('size') }}"
                                        placeholder="Size">
                                    @error('size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 ps-1">
                                    <label class="form-label" for="stock">Stock</label>
                                    <input
                                        type="text"
                                        class="form-control @error('stock') is-invalid @enderror"
                                        name="stock"
                                        value="{{ old('stock') }}"
                                        placeholder="Stock">
                                    @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <button class="btn btn-primary">
                                    <i class="bi bi-plus-circle-dotted me-1"></i>
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                    @include('stock.list')
                </div>
            </div>
        </div>
    </div>
@stop
