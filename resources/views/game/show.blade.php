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
                    <li class="breadcrumb-item active" aria-current="page">Game Detail</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-3">
                        <img src="{{ $game->cover }}" class="w-100 rounded" alt="">
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ $game->profile }}" class="w-100 rounded" alt="">
                        </div>
                        <div class="col-8">
                            <h4 class="card-title">{{ $game->title }}</h4>
                            <hr>
                            <p>
                                {{ $game->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @include('game.currency')
        </div>
    </div>
@stop
