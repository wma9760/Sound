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
            @foreach ($data as $artist)
            <div class="col-sm-12 col-md-6 col-lg-3" id="photo">
                <img id="sm" src="/frontend/images/artist/{{ $artist->artistimage }}" alt="">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-8" id="detail">
                {{-- <p>Artist from your Library</p> --}}
                <h1><b>{{ $artist->name }}</b></h1>
                <p>{{ $artist->desc }}</p>
            </div>            @endforeach
        </div>

        {{-- Audio Player --}}
      {{-- @foreach ($audio as $test )
      @if (is_null($test->artist_id))
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


                                    <b class="player__song-name">{{ $artist->name }}</b>


                                    <span class="flex">

                                        <span class="player__title">
                                            {{ $au->title }}
                                        </span>
                                        <span class="player__song-time"></span>
                                    </span>
                                    {{-- @php
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
            @foreach ($data as $artist)
            <div class="col-sm-12 col-md-6 col-lg-3" id="photo">
                <img id="sm" src="/frontend/images/artist/{{ $artist->artistimage }}" alt="">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-8" id="detail">
                {{-- <p>Artist from your Library</p> --}}
                <h1><b>{{ $artist->name }}</b></h1>
                <p>{{ $artist->desc }}</p>
            </div>            @endforeach
        </div>
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Image</td>
                    <td>Song Title</td>
                    <td>Artist</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>


                @foreach ($vedio as $vedio)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td> <img src="/frontend/images/vedio/{{ $vedio->vedioimage }}" height="50px" width="50px" alt=""> </td>
                        <td>{{ $vedio->title }}</td>


                        <td>{{ $artist->name }}</td>


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

<div class="ms_lang_popup">
    <div id="rate" class="modal  centered-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa_icon form_close"></i>
                </button>
                <div class="modal-body">
                    <div class="ms_share_img">
                        @foreach ($audio as $u)
                            <img src="/frontend/images/audio/{{ $u->audioimage }}" class="img-fluid"
                                alt="Playlist">
                    </div>
                    <div class="ms_share_text">
                        <h1>Rate: {{ $u->title }}</h1>
                        <form action="{{ route('rating.audio') }}" method="POST" class="form-group post">
                            @csrf
                            <input type="hidden" name="track_id" value="{{ $u->id }}">

                            @endforeach
                            <div class="ms_top_lang">

                                <div class="rating-css">
                                    <div class="star-icon">
                                        <input type="radio" value="1" name="stars_rated" checked id="rating1">
                                        <label for="rating1" class="fa fa-star"></label>
                                        <input type="radio" value="2" name="stars_rated" id="rating2">
                                        <label for="rating2" class="fa fa-star"></label>
                                        <input type="radio" value="3" name="stars_rated" id="rating3">
                                        <label for="rating3" class="fa fa-star"></label>
                                        <input type="radio" value="4" name="stars_rated" id="rating4">
                                        <label for="rating4" class="fa fa-star"></label>
                                        <input type="radio" value="5" name="stars_rated" id="rating5">
                                        <label for="rating5" class="fa fa-star"></label>
                                    </div>
                                </div>


                            </div>
                            <input type="submit" class="btn btn-outline-dark mt-3" value="Rate">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ENdrating --}}
</div>

@endsection