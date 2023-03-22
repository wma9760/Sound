@extends('dashboard.layout.main ')
@section('dashboardContainer')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-7">
                <h4 class="page-title">Audio</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class=""><a href="{{ url('/admin') }}">Home</a></li>
                        <span> / </span>
                        <li class=""><a href="{{ url('/audio') }}">Audio</a></li>
                        <span> / </span>
                        <li class=""><a href="{{ url('/audio/create') }}">Create</a></li>
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
                                <h5 class="card-title mb-0">Create Audio</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="admin-form">
                            <form method="POST"  action="{{route('audio.create')}}"
                                accept-charset="UTF-8" data-reset="1"  enctype="multipart/form-data">
@csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <label for="audio_title">Audio Title<sup>*</sup></label>
                                            <input class="form-control require" required="" placeholder="Enter audio Title"
                                                name="title" type="text" value="{{ old('title') }}">
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="from-group pt-3">
                                            <label for="gnere_id">Audio Gnere</label>

                                            <select class="form-select form-control" name="gnere_id">

                                                <option value="">Select Gnere</option>
                                                @foreach ($gneres as $gnere)
                                                    <option {{ old('gnere_id') == $gnere->id ? "selected" : "" }} value="{{ $gnere->id }}">{{ $gnere->name }} </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="from-group pt-3">
                                            <label for="artist_id">Artist</label>

                                            <select class="form-select form-control" name="artist_id">
                                                <option value="">Select Artsit</option>
                                                @foreach ($artists as $artist)
                                                    <option value="{{ $artist->id }}">{{ $artist->name }} </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="from-group pt-3">
                                            <label for="language_id">Audio Language</label>
                                            <select class="form-select form-control" name="language_id">
                                                <option value="">Select Language</option>
                                                @foreach ($languages as $language)
                                                    <option value="{{ $language->id }}">{{ $language->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="from-group pt-3 ">
                                            <label for="">Song Cover Image</label>
                                            <input type="file" name="audioimage" value="{{ old('audioimage') }}" required class="course form-control">

                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group switch-main-block">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="status">Status</label>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-check form-switch mt-2"> <input
                                                            class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked" name="status" value="" >

                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="form-group switch-main-block">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="featured">Featured</label>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-check form-switch mt-2"> <input
                                                            class="form-check-input" name="featured" type="checkbox"
                                                            id="flexSwitchCheckChecked"  value="" >

                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="form-group switch-main-block">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="tremding">Trending</label>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-check form-switch mt-2"> <input
                                                            class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked" name="trending" value="" >

                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="form-group switch-main-block">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="recommended">Recommended</label>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-check form-switch mt-2"> <input
                                                            class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked" name="recommended" value="" >

                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="from-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" rows="5" name="desc" placeholder="Enter Description"  cols="50"
                                                id="description">{{old('desc')}}</textarea>
                                            <small class="text-danger"></small>
                                        </div>


                                        <div class="from-group pt-3">
                                            <label for="">Upload Audio Track</label>
                                            <input type="file" name="audio" required class="course form-control">
                                        </div>
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
