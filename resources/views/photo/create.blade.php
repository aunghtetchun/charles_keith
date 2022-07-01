@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Upload Photo</h4>
                    <hr>
                    <form action="{{ route('photo.store') }}" id="photoUpload" class="mb-3" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="row g-2 align-items-start">
                            <div class="col-6">
                                <label class="form-label" for="parent_stock">Select Post</label>
                                <select
                                    type="text"
                                    class="form-select @error('post') is-invalid @enderror"
                                    name="post"
                                    id="post">
                                    <option value="" selected disabled>Select Post</option>
                                    @forelse($posts as $post)
                                        <option value="{{ $post->id }}">{{ $post->title }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('post')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="parent_stock">Upload Images</label>
                                <input
                                    type="file"
                                    class="form-control @error('upload') is-invalid @enderror"
                                    name="upload[]"
                                    id="photo"
                                    multiple
                                    accept="image/jpeg,image/png"
                                >
                                @error('upload')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-4">
                                <button class="btn btn-primary">
                                    <div class="spinner-grow text-light spinner-grow-sm d-none" id="uploadLoader" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    Upload
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="row g-3">

                        @forelse($photos as $photo)
                        <div class="col-md-3 col-lg-2">
                            <div class="position-relative overflow-hidden img-preview-box">
                                <img src="{{ $photo->thumbnail }}" class="w-100 rounded" alt="">
                                <form action="{{ route('photo.destroy',$photo->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <div class="btn-group btn-group-sm position-absolute img-preview-info">

                                        <button type="submit"
                                                class="btn btn-sm btn-light"
                                                onclick="return confirm('Are U suer to Delete?')">
                                            <i class="bi bi-trash3 text-danger"></i>
                                        </button>
                                        <button
                                            type="button" class="btn btn-light text-primary"
                                            onclick="showPreviewModal(
                                                '{{ $photo->thumbnail }}',
                                                '{{ $photo->md }}',
                                                '{{ $photo->lg }}',
                                                '{{ route('photo.destroy',$photo->id) }}'
                                                )">
                                            <i class="bi bi-info-circle"></i>
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                    <div class="mt-3">
                        {{ $photos->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="previewModalLabel">Photo Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <img src="" class="rounded modal-preview-img shadow" id="modalPreviewImage" alt="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thumbnail Image</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="previewUrlThumbnail" >
                            <button class="btn btn-secondary" onclick="cp('previewUrlThumbnail')">
                                <i class="bi bi-clipboard"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Medium Image</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="previewUrlMd" >
                            <button class="btn btn-secondary" onclick="cp('previewUrlMd')">
                                <i class="bi bi-clipboard"></i>
                            </button>
                        </div>
                    </div>
                    <div class="">
                        <label class="form-label">Large Image</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="previewUrlLg" >
                            <button class="btn btn-secondary" onclick="cp('previewUrlLg')">
                                <i class="bi bi-clipboard"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 justify-content-center">
                    <form action="" id="modalDeleteUrl" method="post">
                        @csrf
                        @method('delete')
                        <div class="text-center ">
                            <button type="submit" class="btn btn-outline-primary">
                                Delete
                            </button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close Detail</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            let photoUpload = document.getElementById("photoUpload");
            let photo = document.getElementById("photo");
            let uploadLoader = document.getElementById("uploadLoader");
            let previewModal = document.getElementById("previewModal");
            let previewUrlThumbnail = document.getElementById("previewUrlThumbnail");
            let previewUrlMd = document.getElementById("previewUrlMd");
            let previewUrlLg = document.getElementById("previewUrlLg");
            let modalPreviewImage = document.getElementById("modalPreviewImage");
            let modalDeleteUrl = document.getElementById("modalDeleteUrl");



            function showPreviewModal(sm,md,lg,delUrl){
                let myPreviewModal = new bootstrap.Modal(previewModal);
                modalPreviewImage.src = md;

                previewUrlThumbnail.value = sm;
                previewUrlMd.value = md;
                previewUrlLg.value = lg;
                modalDeleteUrl.action = delUrl;

                myPreviewModal.show();
            }

            function cp(selectorId){

                let current = document.getElementById(selectorId);

                /* Select the text field */
                current.select();
                current.setSelectionRange(0, 99999); /* For mobile devices */

                /* Copy the text inside the text field */
                navigator.clipboard.writeText(current.value);
            }

            photoUpload.addEventListener('submit',function (){
                uploadLoader.classList.toggle('d-none');
            })

        </script>
    @endpush
@stop
