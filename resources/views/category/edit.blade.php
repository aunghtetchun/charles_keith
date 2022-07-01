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
                        <a href="{{ route('category.index') }}">Category</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Category</h4>
                    <hr>
                    <form action="{{ route('category.update',$category->id) }}" class="mb-3" method="post">
                        @csrf
                        @method('put')
                        <div class="row g-2 align-items-start">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="category">Category</label>
                                <input
                                    type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    name="title"
                                    value="{{ old('title',$category->title) }}"
                                    placeholder="Edit Category">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label" for="parent_category">Select Parent Category</label>
                                <select
                                    type="text"
                                    class="form-select @error('parent_category') is-invalid @enderror"
                                    name="parent_category"
                                    id="parent_category">
                                    <option value="" selected>None</option>
                                    @forelse($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ $cat->id === $category->parent_id ? ' selected':'' }}>{{ $cat->title }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('parent_category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary" onclick="saveBtn(this)">
                                    <i class="bi bi-upload me-1"></i>
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                    @include('category.list')
                </div>
            </div>
        </div>
    </div>
@stop
