@extends('frontend.layout.main')
@section('mainContainer')
    <div class="ms-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="ms_dashboard_slider swiper-container">
                        <div class="swiper-wrapper">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">

                                @foreach ($data  as $slider )
                                <div class="carousel-item">
                                    <img src="{{url('frontend/images/slider/'.$slider->sliderimage)}}" class="d-block w-100" alt="...">
                                  </div>
                                @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                              </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
{{--  --}}
    <div class="ms_featured_slider padder_top20">
        <div class="ms_heading">
            <h1>Featured Artists</h1>
        </div>

        <div class="items row">
            @foreach ($featured as $artist )

            <div class="col-lg-4">

                <a href="{{ route('artist.view', $artist->id) }}">

                    <div class="ms_rcnt_box">
                        <div class="ms_rcnt_box_img">
                            <img src="/frontend/images/artist/{{ $artist->artistimage }}" alt="" class="img-fluid"
                                width="100%">
                            <div class="ms_main_overlay">
                                <div class="ms_box_overlay"></div>
                                <div class="ms_more_icon">
                                    <img src="{{ url('frontend/assets/images/svg/more.svg') }}" alt="">
                                </div>


                            </div>
                        </div>
                        <div class="ms_rcnt_box_text">
                            <h3><a href="../artist/single/5/dahlia-doyle.html">{{ $artist->name }}</a></h3>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach


        </div>

    </div>
    {{-- Audio --}}
    <div class="ms_featured_slider padder_top20">
        <div class="ms_heading">
            <h1>Trending Audio</h1>
        </div>

        <div class="items row">
            @foreach ($audio as $audio )

            <div class="col-lg-4">

                <a href="{{ route('home.playaudio', $audio->id) }}">

                    <div class="ms_rcnt_box">
                        <div class="ms_rcnt_box_img">
                            <img src="/frontend/images/audio/{{ $audio->audioimage }}" alt="" class="img-fluid"
                                width="100%">
                            <div class="ms_main_overlay">
                                <div class="ms_box_overlay"></div>
                                <div class="ms_more_icon">
                                    <img src="{{ url('frontend/assets/images/svg/more.svg') }}" alt="">
                                </div>


                            </div>
                        </div>
                        <div class="ms_rcnt_box_text">
                            <h3><a href="{{route('home.playaudio', $audio->id)}}">{{ $audio->name }}</a></h3>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach


        </div>
        @foreach ($audioalbum as $audioalbum)
        <div class="col-lg-4">

            <a href="{{ route('home.albumviewaudio', $audioalbum->id) }}">

                <div class="ms_rcnt_box">
                    <div class="ms_rcnt_box_img">
                        <img src="/frontend/images/album/{{ $audioalbum->albumimage }}" alt="" class="img-fluid"
                            width="100%">
                        <div class="ms_main_overlay">
                            <div class="ms_box_overlay"></div>
                            <div class="ms_more_icon">
                                <img src="{{ url('frontend/assets/images/svg/more.svg') }}" alt="">
                            </div>


                        </div>
                    </div>
                    <div class="ms_rcnt_box_text">
                        <a href="{{ route('home.albumviewaudio', $audioalbum->id) }}">
                            <h3>{{ $audioalbum->name }}</h3>
                        </a>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    </div>
</div>
    </div>
@endsection
