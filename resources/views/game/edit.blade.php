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
                        <a href="{{ route('game.index') }}">Game</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Update Game</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">New Game Update</h4>
                    <hr>
                    <form action="{{ route('game.update',$game->id) }}" class="mb-3" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class="form-label" for="cover">Game Cover Photo</label>
                            <input
                                type="text"
                                class="form-control @error('cover') is-invalid @enderror"
                                name="cover"
                                id="cover"
                                value="{{ old('cover',$game->cover) }}">
                            @error('cover')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="profile">Game Profile Photo</label>
                            <input
                                type="text"
                                class="form-control @error('profile') is-invalid @enderror"
                                name="profile"
                                id="profile"
                                value="{{ old('profile',$game->profile) }}">
                            @error('profile')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="title">Game Title</label>
                            <input
                                type="text"
                                class="form-control @error('title') is-invalid @enderror"
                                name="title"
                                id="title"
                                value="{{ old('title',$game->title) }}">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">Game Description</label>
                            <textarea
                                type="text"
                                class="form-control @error('description') is-invalid @enderror"
                                name="description"
                                id="description"
                                rows="10">{{ old('description',$game->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <button class="btn btn-primary">
                                <i class="bi bi-plus-circle-dotted me-1"></i>
                                Update Game
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
