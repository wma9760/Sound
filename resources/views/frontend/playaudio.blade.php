@extends('frontend.layout.main')
@section('mainContainer')
    <div class="contentbar">
        <div class="container">
            <div id="#html">
                <div id="body">
                    <div class="player">
                        <div class="player__header">
                            <div class="player__img player__img--absolute slider">
                                <button class="player__button player__button--absolute--nw playlist">
                                    <img src="http://physical-authority.surge.sh/imgs/icon/playlist.svg"
                                        alt="playlist-icon">
                                </button>
                                <button class="player__button player__button--absolute--center play">
                                    <img src="http://physical-authority.surge.sh/imgs/icon/play.svg" alt="play-icon">
                                    <img src="http://physical-authority.surge.sh/imgs/icon/pause.svg" alt="pause-icon">
                                </button>
                                <div class="slider__content">
                                        <img class="img slider__img rotate"
                                            src="/frontend/images/audio/{{ $data->audioimage }}" alt="cover">
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

                                <li class="player__song">
                                    <img class="player__img img" src="/frontend/images/audio/{{ $data->audioimage }}"
                                        alt="Make Me Move (feat. KARRA)" title="Make Me Move (feat. KARRA)">
                                    <p class="player__context">

                                        @foreach ($artist as $artist)
                                            @if ($artist->id == $data->artist_id)
                                                <b class="player__song-name"><a
                                                        href="{{ route('artist.view', $artist->id) }}">{{ $artist->name }}</a></b>
                                            @endif
                                        @endforeach

                                        <span class="flex">

                                            <span class="player__title">
                                                {{ $data->title }}
                                            </span>
                                            <span class="player__song-time"></span>
                                        </span>
                                       @php
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
                                        </span>
                                    </p>
                                    <audio class="audio" src="/frontend/storage/audio/{{ $data->audio }}"></audio>
                                </li>


                        </ul>
                    </div>
                </div>
            </div>
            {{-- rating --}}
            {{-- <h1>{{ $rating->count() }}</h1> --}}
            {{-- @include('commentsDisplay', ['comments' => $track->comments, 'track_id' => $track->id]) --}}



            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card m-b-30">

                        <div class="card-body" id="form-card-body">
                            <div class="frontend-form">

                                <form method="POST" action="{{ route('comment.add') }}"accept-charset="UTF-8"
                                    id="addUpdateArtistForm" enctype="multipart/form-data" data-reset="1" data-modal="1"
                                    table-reload="mrclsDtToShowData" data-redirect="/artist">

                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="form-group">
                                                <input type="hidden" name="track_id" value="{{ $data->id }}" />

                                                <label for="description"><h4>Leave a Comment</h4></label>
                                                <textarea class="form-control" rows="4" name="comment" required placeholder="Enter Comment"  cols="50"
                                                    id="description"></textarea>
                                                <small class="text-danger"></small>
                                            </div>

                                        </div>


                                            <div class="offset-lg-10 col-lg-2 mt-2 offset-md-10 offset-sm-5">
                                                <div class="form-group">

                                                    <input type="submit" class="btn btn-primary" value="Add">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            @include('frontend.replies', ['comments' => $data->comments, 'track_id' => $data->id])
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
                                    <img src="/frontend/images/audio/{{ $data->audioimage }}" class="img-fluid"
                                        alt="Playlist">
                            </div>
                            <div class="ms_share_text">
                                <h1>Rate: {{ $data->title }}</h1>
                                <form action="{{ route('rating.audio') }}" method="POST" class="form-group post">
                                    @csrf
                                    <input type="hidden" name="track_id" value="{{ $data->id }}">
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
    </div>
    </div>
@endsection
{{--  --}}
