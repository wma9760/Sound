@extends('frontend.layout.main')
@section('mainContainer')
    <div class="containerbar">
        <div class="row">
            @foreach ($audio as $audio)
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
                                <a href="{{ route('home.playaudio', $audio->id) }}">
                                    <h3>{{ $audio->title }}</h3>
                                </a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            @foreach ($artist as $artist)
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
                            <a href="{{ route('artist.view', $artist->id) }}">
                                <h3>{{ $artist->name }}</h3>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        @foreach ($vedio as $vedio)
        <div class="col-lg-4">

            <a href="{{ route('home.playvedio', $vedio->id) }}">

                <div class="ms_rcnt_box">
                    <div class="ms_rcnt_box_img">
                        <img src="/frontend/images/vedio/{{ $vedio->vedioimage }}" alt="" class="img-fluid"
                            width="100%">
                        <div class="ms_main_overlay">
                            <div class="ms_box_overlay"></div>
                            <div class="ms_more_icon">
                                <img src="{{ url('frontend/assets/images/svg/more.svg') }}" alt="">
                            </div>


                        </div>
                    </div>
                    <div class="ms_rcnt_box_text">
                        <a href="{{ route('home.playvedio', $vedio->id) }}">
                            <h3>{{ $vedio->title }}</h3>
                        </a>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
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
    @foreach ($vedioalbum as $vedioalbum)
        <div class="col-lg-4">

            <a href="{{ route('home.albumviewvedio', $vedioalbum->id) }}">

                <div class="ms_rcnt_box">
                    <div class="ms_rcnt_box_img">
                        <img src="/frontend/images/album/{{ $vedioalbum->albumimage }}" alt="" class="img-fluid"
                            width="100%">
                        <div class="ms_main_overlay">
                            <div class="ms_box_overlay"></div>
                            <div class="ms_more_icon">
                                <img src="{{ url('frontend/assets/images/svg/more.svg') }}" alt="">
                            </div>


                        </div>
                    </div>
                    <div class="ms_rcnt_box_text">
                        <a href="{{ route('home.albumviewvedio', $vedioalbum->id) }}">
                            <h3>{{ $vedioalbum->name }}</h3>
                        </a>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    @foreach ($gnere as $gnere)
    <div class="col-lg-4">

        <a href="{{ route('gnere.view', $gnere->id) }}">

            <div class="ms_rcnt_box">
                <div class="ms_rcnt_box_img">
                    <img src="/frontend/images/gnere/{{ $gnere->gnereimage }}" alt="" class="img-fluid"
                        width="100%">
                    <div class="ms_main_overlay">
                        <div class="ms_box_overlay"></div>
                        <div class="ms_more_icon">
                            <img src="{{ url('frontend/assets/images/svg/more.svg') }}" alt="">
                        </div>


                    </div>
                </div>
                <div class="ms_rcnt_box_text">
                    <a href="{{ route('gnere.view', $gnere->id) }}">
                        <h3>{{ $gnere->name }}</h3>
                    </a>
                </div>
            </div>
        </a>
    </div>
@endforeach
        </div>
    </div>
@endsection