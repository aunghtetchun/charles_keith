@extends('templates.master')
@section('content')
    <div class="container">

        <div class="row justify-content-center mb-3" id="product">
            <div class="col-12">
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
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div class="mb-3">
                                <label class="form-label">Select In Game Currency</label>
                                @forelse($game->currencies as $currency)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="currency{{ $currency->id }}">
                                    <label class="form-check-label" for="currency{{ $currency->id }}">
                                        {{ $currency->amount }}
                                        {{ $currency->unit }}

                                        {{ $currency->rate }} GP
                                    </label>
                                </div>
                                @empty
                                @endforelse
                            </div>

                            <button class="btn btn-primary w-100">Confirm & Buy</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
