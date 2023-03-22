@extends('dashboard.layout.main ')
@section('dashboardContainer')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-7">
                <h4 class="page-title">audioalbum</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class=""><a href="{{ url('/admin') }}">Home</a></li>
                        <span> / </span>
                        <li class=""><a href="{{ url('/audioalbum') }}">audioalbum</a></li>
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
                                <h5 class="card-title mb-0">Create Album</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="admin-form">
                            <form method="POST"  action="{{route('audioalbum.create')}}"
                                accept-charset="UTF-8" data-reset="1"  enctype="multipart/form-data">
@csrf
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="from-group pt-3">
                                            <label for="album_id">Album</label>

                                            <select class="form-select form-control" name="album_id">
                                                <option value="">Select Album</option>
                                                @foreach ($albums as $album)
                                                    <option value="{{ $album->id }}">{{ $album->name }} </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="from-group pt-3">
                                            <label for="audio_id">Audio</label>

                                            <select class="form-select form-control" name="audio_id">
                                                <option value="">Select Audio</option>
                                                @foreach ($audioes as $audio)
                                                    <option value="{{ $audio->id }}">{{ $audio->title }} </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="from-group pt-3">
                                            <label for="language_id">audioalbum Language</label>
                                            <select class="form-select form-control" name="language_id">
                                                <option value="">Select Language</option>
                                                @foreach ($languages as $language)
                                                    <option value="{{ $language->id }}">{{ $language->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    <div class="offset-lg-10 col-lg-2 offset-md-10 offset-sm-5 py-5">
                                        <div class="from-group pt-3">

                                            <input type="submit" class="btn btn-primary" value="Add">
                                        </div>
                                        {{-- <div class="clear-both"></div> --}}
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
