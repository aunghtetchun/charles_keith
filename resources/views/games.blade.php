@extends('templates.master')
@section('content')
    <div class="container">

        <div class="row justify-content-center mb-3" id="product">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Available Game</h4>
                    <div class="">
                        <form action="{{ route('games') }}" method="get">
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
            @forelse($games as $game)
                <div class="col-lg-4">
                    <div class="card">
                        <img src="{{ $game->profile }}" class="card-img-top product-card-img" alt="">
                        <div class="card-body">
                            <p class="fw-bold card-title">{{ $game->title }}</p>
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="">
                                    <span class="super-small text-black-50">
                                        Start From
                                    </span>
                                    <br>
                                    <span class="fw-bold">
                                        {{ $game->currencies()->orderBy("amount","asc")->first()->amount }}
                                        {{ $game->currencies()->orderBy("amount","asc")->first()->unit }}
                                    </span>
                                </div>
                                <a href="{{ route('game.detail',$game->slug) }}" class="btn btn-sm btn-primary">Buy</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse

        </div>
        <div class="row mb-5" id="promote">
            <div class="col-12">
                <div class="">
                    <img class="w-100" src="https://img.smile.one/media/catalog/product/q/eg/qegeyhww7ef6dxs1650273789.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
