@extends('templates.master')
@section('content')
    <div class="container-fluid ">

        <div class="row justify-content-center m-5" id="product" style="padding-left: 90px; padding-right: 90px;">
            <div class="col-12 col-lg-3 pt-2">
                <div class="card" style="width: 18rem;">

                    <div class="card-body">
                        <h6 class="card-title">CATEGORY</h6>
                        <hr/>
                        @forelse($pid as $p)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <small>  {{ $p->title }} (  {{$p->amount}} )</small>
                                </label>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="card my-5" style="width: 18rem;">

                    <div class="card-body">
                        <h6 class="card-title">COLOR</h6>
                        <hr/>
                        @forelse($posts as $post)
                        <div class="form-check d-flex align-items-center pb-2" >
                            <div>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </div>
                                <label class="form-check-label" for="flexCheckDefault">
                                    <img src="{{ asset("storage/thumbnail_".$post->color_photo) }}" class="rounded-circle" alt="" style="width: 19px; height: 19px">
                                    <small>  {{ $post->color_name }}</small>

                                </label>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>


            </div>
            <div class="col-lg-9 d-flex flex-wrap" >
                @forelse($posts as $post)
                    <div class="col-lg-4 p-2 ">
                        <a href="{{ route('cat.show',$post->id) }}" style="text-decoration: none !important; color: black !important">
                            <div class=" ">
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
                                    <p class="text-center text-decoration-none">{{ $post->title }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection
