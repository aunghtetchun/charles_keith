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
    @forelse($sposts as $post)
        <tr>
            <td class="fw-bold">{{ $post->id }}</td>
            <td>
                {{ str()->words($post->title,5) }}
                <div class="">
                    @forelse($post->stock as $stock)
                        <a href="{{ route('stock.edit',$stock->id) }}" class="badge bg-dark-soft super-small" style="text-decoration: none; list-style-type: none;">
                                            <i class="bi bi-archive me-1"></i>
                                            {{ $stock->size }} (  {{ $stock->stock }}  )
                                        </a>
                    @empty

                        @endforelse

                </div>
            </td>
            <td>
                <button class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-cursor"></i>
                </button>
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
    {{ $sposts->onEachSide(1)->links() }}
</div>
