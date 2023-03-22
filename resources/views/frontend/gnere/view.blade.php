@extends('frontend.layout.main')
@section('mainContainer')
<div class="contentbar">
    <div class="container">
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Audio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Vedio</a>
    </li>

  </ul>
  <div class="tab-content" id="myTabContent">

      {{-- Audio start --}}
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
            @foreach ($data as $gnere)


            <div class="col-sm-12 col-md-6 col-lg-3" id="photo">
                <img id="sm" src="/frontend/images/gnere/{{ $gnere->gnereimage }}" alt="">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-8" id="detail">
                {{-- <p>gnere from your Library</p> --}}
                <h1><b>{{ $gnere->name }}</b></h1>
                <p>{{ $gnere->desc }}</p>
            </div>
             @endforeach
        </div>

        {{-- Audio Player --}}
      {{-- @foreach ($audio as $test )
      @if (is_null($test->gnere_id))
      <h1>Error</h1>
      @endif --}}
      {{-- @endforeach --}}
        <div id="#html">
            <div id="body">
                <div class="player">
                    <div class="player__header">
                        <div class="player__img player__img--absolute slider">
                            <button class="player__button player__button--absolute--nw playlist">
                                <img src="http://physical-authority.surge.sh/imgs/icon/playlist.svg" alt="playlist-icon">
                            </button>
                            <button class="player__button player__button--absolute--center play">
                                <img src="http://physical-authority.surge.sh/imgs/icon/play.svg" alt="play-icon">
                                <img src="http://physical-authority.surge.sh/imgs/icon/pause.svg" alt="pause-icon">
                            </button>
                            <div class="slider__content">
                                @foreach ($audio as $u)
                                    <img class="img slider__img rotate" src="/frontend/images/audio/{{ $u->audioimage }}"
                                        alt="cover">
                                @endforeach
                            </div>
                        </div>
                        <div class="player__controls">
                            <button class="player__button back">
                                <img class="img" src="http://physical-authority.surge.sh/imgs/icon/back.svg"
                                    alt="back-icon">
                            </button>
                            <p class="player__context slider__context">
                                <strong class="slider__name"></strong>
                                <span class="player__title slider__title"></span>
                            </p>
                            <button class="player__button next">
                                <img class="img" src="http://physical-authority.surge.sh/imgs/icon/next.svg"
                                    alt="next-icon">
                            </button>
                            <div class="progres">
                                <div class="progres__filled"></div>
                            </div>

                        </div>

                    </div>
                    <ul class="player__playlist list">

                        @foreach ($audio as $au)
                            <li class="player__song">
                                <img class="player__img img" src="/frontend/images/audio/{{ $au->audioimage }}"
                                    alt="Make Me Move (feat. KARRA)" title="Make Me Move (feat. KARRA)">
                                <p class="player__context">


                                    <b class="player__song-name">{{ $gnere->name }}</b>


                                    <span class="flex">

                                        <span class="player__title">
                                            {{ $au->title }}
                                        </span>
                                        <span class="player__song-time"></span>
                                    </span>
                                    {{-- s @php
                                    $rate_number=number_format($rating_value)
                                @endphp
                                 <span class="mt-2" id="star">
                                     <span class="text-dark">

                                         @for ($i =1; $i <=$rate_number ; $i++)
                                         <i class="fa fa-star star_checked s" ></i>
                                         @endfor
                                         @for ($j =$rate_number+1 ; $j <=5 ; $j++)

                                         <i class="fa fa-star star_unchecked " ></i>
                                         @endfor
                                         @if ($rating->count()>0)

                                             <small>Ratings {{$rating->count()}}</small>

                                         @else
                                         <small>No Ratings</small>

                                         @endif
                                     </span>
                                 <a href="javascript:;" class="btn btn-outline-info btn-sm float-end" data-toggle="modal"
                                     data-target="#rate"><span>Rate Track</span></a>
                                 </span> --}}
                                </p>
                                <audio class="audio" src="/frontend/storage/audio/{{ $au->audio }}"></audio>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- Audioe End --}}
    {{-- VEdio Start --}}
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row">
            @foreach ($data as $gnere)
            <div class="col-sm-12 col-md-6 col-lg-3" id="photo">
                <img id="sm" src="/frontend/images/gnere/{{ $gnere->gnereimage }}" alt="">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-8" id="detail">
                {{-- <p>gnere from your Library</p> --}}
                <h1><b>{{ $gnere->name }}</b></h1>
                <p>{{ $gnere->desc }}</p>
            </div>            @endforeach
        </div>
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Image</td>
                    <td>Song Title</td>
                    <td>gnere</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>


                @foreach ($vedio as $vedio)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td> <img src="/frontend/images/vedio/{{ $vedio->vedioimage }}" height="50px" width="50px" alt=""> </td>
                        <td>{{ $vedio->title }}</td>


                        <td>{{ $gnere->name }}</td>


                        <td><a href="{{ route('home.playvedio', $vedio->id) }}"><i class="fa fa-play fa-2xl fa-lg fa-xl"></i></a>
                        </td>

                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>
    {{-- Vedioend --}}
  </div>
</div>
</div>
@endsection