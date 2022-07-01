<table class="table align-middle mb-0">
    <thead>
    <tr>
        <th>#</th>
        <th class="w-40">Title</th>
        <th>Parent</th>
        <th>Controls</th>
        <th>Created</th>
    </tr>
    </thead>
    <tbody>
    @forelse($categories as $category)
        <tr>
            <td class="fw-bold">{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            @if (isset($category->parent_id))
                <td> {{ \App\Models\Category::where('id', $category->parent_id)->first('title')['title'] }}</td>
            @else
                <td></td>
                @endif
            <td>
                <form action="{{ route('category.destroy',$category->id) }}" id="delFrom{{ $category->id }}" method="post">
                    @csrf
                    @method('delete')
                </form>
                <div class="btn-group btn-group-sm">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('category.edit',$category->id) }}">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-cursor"></i>
                    </button>
                    <button
                        form="delFrom{{ $category->id }}"
                        onclick="return confirm('Are U sure to Delete ?')"
                        class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-trash3"></i>
                    </button>
                </div>
            </td>
            <td>
                <p class="date mb-0">
                    <i class="bi bi-calendar me-1"></i>
                    {{ $category->created_at->format("d M Y") }}
                </p>
                <p class="time mb-0">
                    <i class="bi bi-clock me-1"></i>
                    {{ $category->created_at->format("h:i A") }}
                </p>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center">There is no Category</td>
        </tr>
    @endforelse
    </tbody>
</table>
