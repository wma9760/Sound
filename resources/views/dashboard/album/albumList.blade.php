@extends('dashboard.layout.main')
@section('dashboardContainer')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-7">
                <h4 class="page-title">Album Tracks</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class=""><a href="{{ url('/admin') }}">Home </a></li>
                        <span> / </span>
                        <li class=""><a href="{{ url('/album') }}">Album </a></li>
                        <span> / </span>
                        <li class=""><a href="#"> Album Tracks</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-5 col-lg-5">
                <div class="widgetbar">
                    {{-- <a href="{{url('/audioalbum/create')}}" class="btn btn-primary-rgba mr-2"><i class="fa-solid fa-file-plus"></i>Create audioalbum </a> --}}

                </div>
            </div>
        </div>
     </div>

       <div class="contentbar">
            <div class="row">

                <div class="col-sm-12 col-md-6 col-lg-3" id="photo">
                    @foreach ($data as $album )

                    @endforeach
                    <img id="sm" src="/frontend/images/album/{{ $album->albumimage }}" alt="">
                </div>
                <div class="col-sm-12 col-md-6 col-lg-8" id="detail">
                    <h1><b>{{ $album->name }}</b></h1>
                    <p>{{ $album->desc }}</p>
                </div>

            </div>

            @if ($album->category=="audio")
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
                            @foreach ($audio as $u )
                            <img class="img slider__img rotate" src="/frontend/images/audio/{{$u->audioimage}}" alt="cover">

                            @endforeach
                        </div>
                    </div>
                    <div class="player__controls">
                        <button class="player__button back">
                            <img class="img" src="http://physical-authority.surge.sh/imgs/icon/back.svg" alt="back-icon">
                        </button>
                        <p class="player__context slider__context">
                            <strong class="slider__name"></strong>
                            <span class="player__title slider__title"></span>
                        </p>
                        <button class="player__button next">
                            <img class="img" src="http://physical-authority.surge.sh/imgs/icon/next.svg" alt="next-icon">
                        </button>
                        <div class="progres">
                            <div class="progres__filled"></div>
                        </div>

                    </div>

                </div>
                <ul class="player__playlist list">

                    @foreach ($audio as $au )

                    <li class="player__song">
                        <img class="player__img img" src="/frontend/images/audio/{{$au->audioimage}}" alt="Make Me Move (feat. KARRA)" title="Make Me Move (feat. KARRA)">
                        <p class="player__context">
                            @foreach ($artist as $item)
                            @if ($au->artistid==$item->id)

                            <b class="player__song-name">{{$item->name}}</b>

                            @endif
                            @endforeach
                            <span class="flex">

                                <span class="player__title">
                                    {{$au->audioname}}
                                   </span>
                                <span class="player__song-time"></span>
                            </span>
                        </p>
                        <audio class="audio" src="/frontend/storage/audio/{{$au->audio}}"></audio>
                    </li>
                    @endforeach
                </ul>
            </div>
            </div>
        </div>
        @elseif($album->category=="vedio")
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


                    @foreach ($vedio as $vedio )
                    <tr>
                        <td>{{$count++}}</td>
                        <td> <img src="/frontend/images/vedio/{{$vedio->vedioimage}}"
                            height="50px" width="50px" alt=""> </td>
                        <td>{{$vedio->vedioname}}</td>
                        @foreach ($artist as $item)
                            @if ($vedio->artistid==$item->id)

                            <td>{{$item->name}}</td>

                            @endif
                            @endforeach
                            <td><a href="{{route('album.play',$vedio->id)}}"><i class="fa fa-play fa-2xl fa-lg fa-xl"></i></a></td>

                    </tr>
                    @endforeach



            </tbody>
        </table>
        @endif
        </div>
@endsection