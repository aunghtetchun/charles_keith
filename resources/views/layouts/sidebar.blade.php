<div class="sidebar">
    <div class="mb-3">
        <div class="list-group">
            <a class="list-group-item list-group-item-action" href="{{ route('home') }}" >
                <i class="bi bi-house"></i>
                <span>Home</span>
            </a>
            <a class="list-group-item list-group-item-action" href="#">
                <i class="bi bi-pie-chart"></i>
                <span>Analysis</span>
            </a>
            <a class="list-group-item list-group-item-action" href="{{ route('photo.create') }}">
                <i class="bi bi-images"></i>
                <span>Gallery</span>
            </a>

        </div>
    </div>


    <div class="mb-3">
        <p class="title text-black-50 mb-1">Manage Blog</p>
        <div class="list-group">
            <a class="list-group-item list-group-item-action" href={{ route('category.index') }} >
                <i class="bi bi-card-list"></i>
                <span>Category</span>
            </a>
            <a class="list-group-item list-group-item-action" href="{{ route("post.create") }}" >
                <i class="bi bi-plus-circle"></i>
                <span>Create Post</span>
            </a>
            <a class="list-group-item list-group-item-action" href="{{ route("post.index") }}">
                <i class="bi bi-card-checklist"></i>
                <span>Post List</span>
            </a>
            <a class="list-group-item list-group-item-action" href="{{ route("post.index",["trash"=>true]) }}">
                <i class="bi bi-trash3"></i>
                <span>Deleted Post</span>
            </a>
            <a class="list-group-item list-group-item-action" href={{ route('stock.index') }} >
                <i class="bi bi-card-list"></i>
                <span>Stock</span>
            </a>

        </div>
    </div>

    <div class="mb-3">
        <p class="title text-black-50 mb-1">Sample Menu</p>
        <div class="list-group">
            <a class="list-group-item list-group-item-action" href="#" >
                <i class="bi bi-list"></i>
                <span>Menu 1</span>
            </a>
            <a class="list-group-item list-group-item-action" href="#">
                <i class="bi bi-list"></i>
                <span>Menu 2</span>
            </a>
            <a class="list-group-item list-group-item-action" href="#">
                <i class="bi bi-list"></i>
                <span>Menu 3</span>
            </a>

        </div>
    </div>

    <div class="">
        <p class="title text-black-50 mb-1">Profile Setting</p>
        <div class="list-group">
            <a class="list-group-item list-group-item-action " href="#" >
                <i class="bi bi-person"></i>
                <span>Your Profile</span>
            </a>
            <a class="list-group-item list-group-item-action" href="#">
                <i class="bi bi-pie-chart"></i>
                <span>Change Password</span>
            </a>
        </div>

        <div class="list-group mt-3">
            <a
                class="list-group-item list-group-item-action"
                href="#"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
            >
                <i class="bi bi-unlock"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
</div>
