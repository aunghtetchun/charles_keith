@extends('templates.master')
@section('content')
    <div class="container-fluid ">

        <div class="row justify-content-center m-5 " id="product" style="padding-left: 85px; padding-right: 85px;">
            <div class="col-12 col-lg-8">
                <!-- Gallery -->
                <div class="row ">
                    @forelse($post->photo as $key => $p)
                        <div class="col-12 col-md-6 col-lg-6 px-0 pb-3">
                            <img
                                src="{{  asset('storage/lg_'.$p->name) }}"
                                class="w-100 rounded pe-3"
                            />
                        </div>
                    @empty
                    @endforelse


                </div>
                <!-- Gallery -->
            </div>
            <div class="col-lg-4 ">
                <h6 class="fw-bold">{{$post->title}}</h6>
                <small class="text-black-50 text-uppercase my-2" style="font-size: 11px">Item No. {{$post->item_code}}_{{$post->color_name }}</small>
                <small class="fw-bold d-block mt-2">$ {{ $post->price }}</small>
                <div class="text-start mt-2">
                    <p class="small mb-0">Color :
                        <span class="fw-bold small">{{ $post->color_name }}</span>
                    </p>
                @forelse($colors as $color)
                        <a href="{{  route('cat.show',$color->id)  }}" style="text-decoration: none !important; color: black !important">
                            <img src="{{  asset('storage/thumbnail_'.$color->color_photo) }}" class="rounded-circle " alt="" style="width: 19px; height: 19px">
                        </a>
                    @empty
                    @endforelse
                </div>
                <div class="mt-4">
                    <p class="small mb-0">Sizes :
                        <span class="fw-bold small"> Select Size</span>
                    </p>
                    @forelse($post->stock as  $s)
                        @if ($s->stock > 100)
                        <button type="button" class="btn border mt-3 me-4 pt-2 border-2 btn-sm border-success  position-relative">
                            {{ $s->size }}

                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
{{--                                {{$s->stock}}--}}
                                instock
                            </span>
                        </button>
                        @elseif($s->stock<=100 && $s->stock!=0)
                            <button type="button" class="btn border mt-3 me-4 border-2 btn-sm border-warning  position-relative">
                                {{ $s->size }}
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
{{--                                {{$s->stock}}--}}
                                low
                            </span>
                            </button>
                            @else
                            <button type="button" class="btn border mt-3 me-4 border-2 btn-sm border-danger disabled  position-relative">
                                {{ $s->size }}

                                <span class="position-absolute top-0 start-100 translate-middle badge  rounded-pill bg-danger">
                                {{$s->stock}}
                                    {{--                                    out--}}
                            </span>
                            </button>
                            @endif
                    @empty
                    @endforelse
                </div>
                <div class="mt-4">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                                <button class="nav-link fw-bold small  active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"  role="tab" aria-controls="pills-home" aria-selected="true">PRODUCT DESCRIPTIONS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold small " id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"  role="tab" aria-controls="pills-profile" aria-selected="false">DETAILS</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <small>
                                {{ $post->description }}
                            </small>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <small>
                                {{ $post->detail }}
                            </small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
