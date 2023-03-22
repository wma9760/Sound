@extends('dashboard.layout.main ')
@section('dashboardContainer')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-7">
                <h4 class="page-title">Audio Album</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class=""><a href="{{ url('/admin') }}">Home</a></li>
                        <span> / </span>
                        <li class=""><a href="{{ url('/audioalbum') }}">Audio Album</a></li>
                        <span> / </span>
                        <li class=""><a href="{{ url('/audioalbum/create') }}">Create</a></li>
                    </ol>
                </div>
            </div>

        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="contentbar">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">

                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title mb-0">Create </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="admin-form">
                            <form method="POST"  action="{{ route('audioalbum.update',$audioalbum->id) }}"
                                accept-charset="UTF-8" data-reset="1"  enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-lg-12">

        <div class="from-group pt-3">
            <label for="album_id">Album</label>

            <select class="form-select form-control" name="album_id">
                <option value="">Select Album</option>
                @foreach ($albums as $album)
                   @if ($album->id==$audioalbum->album_id)
                   <option value="{{ $album->id }}" selected>{{ $album->name }} </option>
                   @else
                   <option value="{{ $album->id }}" >{{ $album->name }} </option>
                   @endif
                @endforeach
            </select>

        </div>
        <div class="from-group pt-3">
            <label for="audio_id">Audio</label>

            <select class="form-select form-control" name="audio_id">
                <option value="">Select Audio</option>
                @foreach ($audioes as $audio)
                @if ($audio->id==$audioalbum->audio_id)
                <option value="{{ $audio->id }}" selected>{{ $audio->title }} </option>
                @else
                <option value="{{ $audio->id }}" >{{ $audio->title }} </option>
                @endif
                @endforeach
            </select>

        </div>
        <div class="from-group pt-3">
            <label for="language_id">audioalbum Language</label>
            <select class="form-select form-control" name="language_id">
                <option value="">Select Language</option>
                @foreach ($languages as $language)
                @if($language->id==$audioalbum->language_id)
                <option value="{{ $language->id }}" selected>{{ $language->name }} </option>
                @else
                <option value="{{ $language->id }}" >{{ $language->name }} </option>
                @endif
                @endforeach
            </select>
        </div>

    <div class="offset-lg-10 col-lg-2 offset-md-10 offset-sm-5 py-5">
        <div class="from-group pt-3">

            <input type="submit" class="btn btn-primary" value="Add">
        </div>
    </div>
</div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
