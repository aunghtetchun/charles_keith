<div class="card">
    <div class="card-body">
        <h4 class="card-title">In Game Currency</h4>
        <hr>
        <form action="{{ route('currency.store') }}" class="mb-3" method="post">
            @csrf
            <input type="hidden" name="game_id" value="{{ $game->id }}">
            <div class="row g-2">
                <div class="col-3">
                    <label for="name" class="form-label">Name</label>
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        name="name"
                        id="name"
                        value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="bonus" class="form-label">Bonus</label>
                    <input
                        type="text"
                        class="form-control @error('bonus') is-invalid @enderror"
                        name="bonus"
                        id="bonus"
                        value="{{ old('bonus') }}">
                    @error('bonus')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="rate" class="form-label">Game Point</label>
                    <input
                        type="number"
                        class="form-control @error('rate') is-invalid @enderror"
                        name="rate"
                        id="rate"
                        value="{{ old('rate') }}">
                    @error('rate')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="rate" class="form-label">Icon</label>
                    <input
                        type="text"
                        class="form-control @error('icon') is-invalid @enderror"
                        name="icon"
                        id="icon"
                        value="{{ old('icon') }}">
                    @error('icon')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100 h-100">
                        <i class="bi bi-plus-circle-dotted me-1"></i>
                        Add IGC
                    </button>
                </div>
            </div>
        </form>
        <table class="table align-middle">
            <thead>
            <tr>
                <th>#</th>
                <th class="w-50">Name</th>
                <th>Game Point</th>
                <th>Controls</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            @forelse($game->currencies as $currency)
                <tr>
                    <td>{{ $currency->id }}</td>
                    <td>
                        <img src="{{ $currency->icon }}" class="igc-icon" alt="">
                        {{ $currency->name }}
                        @if($currency->bonus)
                            +
                            <span class="text-success">{{ $currency->bonus }}</span>
                        @endif
                    </td>
                    <td>{{ $currency->rate }} GP</td>
                    <td>
                        <form action="{{ route('currency.destroy',$currency->id) }}" id="delFrom{{ $currency->id }}" method="post">
                            @csrf
                            @method('delete')
                        </form>

                        <div class="modal fade" id="editModal{{ $currency->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModal{{ $currency->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModal{{ $currency->id }}Label">Edit In Game Currency</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('currency.update',$currency->id) }}" id="updateForm{{$currency->id}}" class="mb-3" method="post">
                                            @csrf
                                            @method('put')

                                            <div class="row g-2">
                                                <div class="col-4">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input
                                                        type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name"
                                                        id="name"
                                                        value="{{ old('name',$currency->name) }}">
                                                    @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-4">
                                                    <label for="bonus" class="form-label">Bonus</label>
                                                    <input
                                                        type="text"
                                                        class="form-control @error('bonus') is-invalid @enderror"
                                                        name="bonus"
                                                        id="bonus"
                                                        value="{{ old('bonus',$currency->bonus) }}">
                                                    @error('bonus')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-4">
                                                    <label for="rate" class="form-label">Game Point</label>
                                                    <input
                                                        type="number"
                                                        class="form-control @error('rate') is-invalid @enderror"
                                                        name="rate"
                                                        id="rate"
                                                        value="{{ old('rate',$currency->rate) }}">
                                                    @error('rate')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <label for="rate" class="form-label">Icon</label>
                                                    <input
                                                        type="text"
                                                        class="form-control @error('icon') is-invalid @enderror"
                                                        name="icon"
                                                        id="icon"
                                                        value="{{ old('icon',$currency->icon) }}">
                                                    @error('icon')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" form="updateForm{{$currency->id}}">
                                            <i class="bi bi-upload me-1"></i>
                                            Update IGC
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="btn-group btn-group-sm">

                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editModal{{ $currency->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>

                            <button
                                form="delFrom{{ $currency->id }}"
                                onclick="return confirm('Are U sure to Delete ?')"
                                class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-trash3"></i>
                            </button>

                        </div>

                    </td>
                    <td>
                        <p class="date mb-0">
                            <i class="bi bi-calendar me-1"></i>
                            {{ $currency->created_at->format("d M Y") }}
                        </p>
                        <p class="time mb-0">
                            <i class="bi bi-clock me-1"></i>
                            {{ $currency->created_at->format("h:i A") }}
                        </p>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">There is no In Game Currency</td>
                </tr>
            @endforelse
            </tbody>
        </table>


    </div>
</div>
