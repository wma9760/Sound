@extends('frontend.layout.main')
@section('mainContainer')
<div class="row">
    @foreach ($album as $album)
        <div class="col-sm-12 col-md-6 col-lg-3" id="photo">
            <img id="sm" src="/frontend/images/album/{{ $album->albumimage }}" alt="">
        </div>
        <div class="col-sm-12 col-md-6 col-lg-8" id="detail">
            {{-- <p>Artist from your Library</p> --}}
            <h1><b>{{ $album->name }}</b></h1>
            <p>{{ $album->desc }}</p>
        </div>
    @endforeach
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
                    <td><a href="{{route('home.playvedio',$vedio->id)}}"><i class="fa fa-play fa-2xl fa-lg fa-xl"></i></a></td>

            </tr>
            @endforeach



    </tbody>
</table>@endsection