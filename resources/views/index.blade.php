@extends('templates.master')
@section('content')
    <div class="container">
        <div class="row mb-5" id="hero">
            <div class="col-12">
            </div>
        </div>
        <div class="row justify-content-center " id="product">
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-center  align-items-center mb-3">
                    <h4 class="fw-bold col-12 text-center">WHAT'S NEW</h4>
                    <h6 class="fw-bold ">SHOP NOW</h6>
                </div>
            </div>

            @forelse($posts as $post)
                <div class="col-lg-3">
                    <div class="card">
                        <div id="{{$post->slug}}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @forelse($post->photo as $key => $p)
                                    <div class="carousel-item {{$key == 0 ? 'active':''}}">
                                        <img src="{{ asset('storage/lg_'. $p->name )}}"  class="d-block w-100" alt="...">
                                    </div>
                                @empty
                                @endforelse

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#{{$post->slug}}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#{{$post->slug}}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <div class="card-body">
                            <p class="text-center small text-decoration-none">{{ $post->title }}</p>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
            <div class="col-12">
                <div class="text-center my-3">
                    <p>Check All Game & Read More</p>
                    <a href="" class="btn btn-outline-primary">
                        All Games
                    </a>
                </div>
            </div>
        </div>
        <div class="row mb-5" id="promote">
            <div class="col-12">
                <div class="">
                    <img class="w-100" src="https://img.smile.one/media/catalog/product/q/eg/qegeyhww7ef6dxs1650273789.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="text-center mb-3">
                        <h4 class="mb-0">Our Blog</h4>
                        <p>What is new in our website ?</p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="text-center my-3">
                        <a href="" class="btn btn-outline-primary">
                            Read All Blog
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
