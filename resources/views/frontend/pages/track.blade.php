@extends('frontend.layout.main')
@section('mainContainer')
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Audio</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Vedio</button>
  </li>

</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="ms_featured_slider padder_top20">
    <div class="ms_heading">
        <h1>Featured Audioes</h1>
    </div>

    <div class="items row">
        @foreach ($featured as $audio)
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
                        <h3><a href="">{{ $audio->title }}</a></h3>
                    </div>
                </div>
                </a>
            </div>
        @endforeach

    </div>

</div>
<div class="ms_featured_slider padder_top20">
    <div class="ms_heading">
        <h1>Trending Audioes</h1>
    </div>

    <div class="items row">
        @foreach ($trending as $audio)
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
                        <h3><a href="">{{ $audio->title }}</a></h3>
                    </div>
                </div>
                </a>
            </div>
        @endforeach

    </div>

</div>
<div class="ms_featured_slider padder_top20">
    <div class="ms_heading">
        <h1>Recommended Audioes</h1>
    </div>

    <div class="items row">
        @foreach ($recommended as $audio)
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
                        <h3><a href="">{{ $audio->title }}</a></h3>
                    </div>
                </div>
                </a>
            </div>
        @endforeach

    </div>

</div>
<div class="ms_top_audio">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="ms_heading">
                <h1>Top Audioes</h1>
            </div>
        </div>

    </div>
    <div class="ms_empty_data">
        <div class="row  ">
            <div class="col-lg-6">
                <table class="table table-borderless ">

                    <tbody>

                        @foreach ($top as $top)
                            <tr>
                                <td> <img src="/frontend/images/audio/{{ $top->audioimage }}" height="50px"
                                        width="100px" alt=""> </td>
                                <td>{{ $top->title }}</td>



                                    <td >
                                        <a class="r"href="{{ route('home.playaudio', $top->id) }}"><i class="fa fa-play fa-lg"></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <div class="ms_featured_slider padder_top20">
    <div class="ms_heading">
        <h1>Featured Vedioes</h1>
    </div>

    <div class="items row">
        @foreach ($featured_v as $vedio)
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
                        <h3><a href="">{{ $vedio->title }}</a></h3>
                    </div>
                </div>
                </a>
            </div>
        @endforeach

    </div>

</div>
{{-- Trending --}}
<div class="ms_featured_slider padder_top20">
    <div class="ms_heading">
        <h1>Trending Vedioes</h1>
    </div>

    <div class="items row">
        @foreach ($trending_v as $vedio)
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
                        <h3><a href="">{{ $vedio->title }}</a></h3>
                    </div>
                </div>
                </a>
            </div>
        @endforeach

    </div>

</div>
{{-- Recommended --}}
<div class="ms_featured_slider padder_top20">
    <div class="ms_heading">
        <h1>Recommended Vedioes</h1>
    </div>

    <div class="items row">
        @foreach ($recommended_v as $vedio)
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
                        <h3><a href="">{{ $vedio->title }}</a></h3>
                    </div>
                </div>
                </a>
            </div>
        @endforeach

    </div>

</div>
{{--  --}}
<div class="ms_top_audio">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="ms_heading">
                <h1>Top audio</h1>
            </div>
        </div>

    </div>
    <div class="ms_empty_data">
        <div class="row  ">
            <div class="col-lg-8">
                <table class="table table-borderless ">

                    <tbody>
                        @foreach ($top_v as $top)
                            <tr>
                                <td> <img src="/frontend/images/vedio/{{ $top->vedioimage }}" height="50px"
                                        width="100px" alt=""> </td>
                                <td>{{ $top->title }}</td>
                                {{-- @foreach ($artist as $artist )
                                    @if ($artist->id==$top->artist_id)

                                    <td><a href="{{route('artist.view',$artist->id)}}">{{$artist->name}}</a></td>
                                    @endif
                                @endforeach --}}
                                <td >
                                    <a class="r"href="{{ route('home.playvedio', $top->id) }}"><i class="fa fa-play fa-lg"></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div><div class="container-fluid">

@endsection
