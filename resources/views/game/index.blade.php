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
                        <a href="{{ route('game.index') }}">Game</a>
                    </li>
                    @endtrash
                    <li class="breadcrumb-item active" aria-current="page">@trash Deleted @endtrash Game List</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        @trash Deleted @endtrash Game list
                    </h4>
                    <hr>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="">
                            @if(request('keyword'))
                                <span>Search By "{{ request('keyword') }}"</span>
                                <a href="{{ route('game.index') }}" class="ms-2 text-danger">
                                    <i class="bi bi-trash"></i>
                                </a>
                            @endif
                        </div>
                        <div class="">
                            <form action="{{ route('game.index') }}" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" placeholder="Search Game">
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
                        @forelse($games as $game)
                            <tr>
                                <td class="fw-bold">{{ $game->id }}</td>
                                <td>
                                    {{ str()->words($game->title,5) }}
                                    <span class="super-small text-black-50 d-block">
                                        {{ str()->words($game->description,10) }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('game.destroy',$game->id) }}" id="delFrom{{ $game->id }}" method="post">
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
                                                href="{{ route('game.show',[$game->id,'mode'=>'restore']) }}">
                                                <i class="bi bi-arrow-clockwise"></i>
                                            </a>
                                        @else
                                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('game.edit',$game->id) }}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('game.show',$game->id) }}">
                                            <i class="bi bi-info-circle"></i>
                                        </a>
                                        @endtrash
                                        <button
                                            form="delFrom{{ $game->id }}"
                                            onclick="return confirm('Are U sure to Delete ?')"
                                            class="btn btn-sm btn-outline-secondary">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <p class="date mb-0">
                                        <i class="bi bi-calendar me-1"></i>
                                        {{ $game->created_at->format("d M Y") }}
                                    </p>
                                    <p class="time mb-0">
                                        <i class="bi bi-clock me-1"></i>
                                        {{ $game->created_at->format("h:i A") }}
                                    </p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">There is no Game</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="">
                        {{ $games->onEachSide(1)->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
