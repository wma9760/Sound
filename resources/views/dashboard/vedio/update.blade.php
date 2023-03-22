@extends('dashboard.layout.main ')
@section('dashboardContainer')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-7">
                <h4 class="page-title">Vedio</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class=""><a href="{{ url('/admin') }}">Home</a></li>
                        <span> / </span>
                        <li class=""><a href="{{ url('/vedio') }}">Vedio</a></li>
                        <span> / </span>
                        <li class=""><a href="{{ url('/vedio/create') }}">Create</a></li>
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
                                <h5 class="card-title mb-0">Create Vedio</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="admin-form">
                            <form method="POST" action="{{ route('vedio.update', $vedio->id) }}" accept-charset="UTF-8"
                                data-reset="1" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <label for="vedio_title">Vedio Title<sup>*</sup></label>
                                            <input class="form-control require" required="" placeholder="Enter vedio Title"
                                                name="title" type="text" value="{{ $vedio->title }}">
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="from-group pt-3">
                                            <label for="gnere_id">Vedio Gnere</label>

                                            <select class="form-select form-control" name="gnere_id">
                                                <option value="">Select Gnere</option>
                                                @foreach ($gneres as $gnere)
                                                    @if ($gnere->id == $vedio->gnere_id)
                                                        <option value="{{ $gnere->id }}" selected>{{ $gnere->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $gnere->id }}">{{ $gnere->name }} </option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="from-group pt-3">
                                            <label for="artist_id">Artist</label>

                                            <select class="form-select form-control" name="artist_id">
                                                <option value="">Select Artsit</option>
                                                @foreach ($artists as $artist)
                                                    @if ($artist->id == $vedio->artist_id)
                                                        <option value="{{ $artist->id }}" selected>{{ $artist->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $artist->id }}">{{ $artist->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="from-group pt-3">
                                            <label for="language_id">Vedio Language</label>
                                            <select class="form-select form-control" name="language_id">
                                                <option value="">Select Language</option>
                                                @foreach ($languages as $language)
                                                    @if ($language->id == $vedio->language_id)
                                                        <option value="{{ $language->id }}" selected>
                                                            {{ $language->name }} </option>
                                                    @else
                                                        <option value="{{ $language->id }}">{{ $language->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group pt-3">
                                            <label for="">Upload Image</label>
                                            <input type="file" name="userimage" class=" form-control"
                                                value="{{ $vedio->vedioimage }}">
                                            <img src="/frontend/images/vedio/{{ $vedio->vedioimage }}"
                                                class="img-fluid py-2" width="200px">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group switch-main-block">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="status">Status</label>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-check form-switch mt-2">
                                                        @if ($vedio->status == 0)
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="status"
                                                                value="{{ $vedio->status }}">
                                                        @else
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="status" checked
                                                                value="{{ $vedio->status }}">
                                                        @endif

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
                                                    <div class="form-check form-switch mt-2">
                                                        @if ($vedio->featured == 0)
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="featured"
                                                                value="{{ $vedio->featured }}">
                                                        @else
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="featured" checked
                                                                value="{{ $vedio->featured }}">
                                                        @endif

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
                                                    <div class="form-check form-switch mt-2">
                                                        @if ($vedio->trending == 0)
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="trending"
                                                                value="{{ $vedio->trending }}">
                                                        @else
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="trending" checked
                                                                value="{{ $vedio->trending }}">
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="form-group switch-main-block">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="recommended">Recommended </label>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-check form-switch mt-2">
                                                        @if ($vedio->recommended == 0)
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="recommended"
                                                                value="{{ $vedio->recommended }}">
                                                        @else
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="recommended" checked
                                                                value="{{ $vedio->recommended }}">
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="from-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" rows="5" name="desc" placeholder="Enter Description" cols="50"
                                                id="description">{{ $vedio->desc }}</textarea>
                                            <small class="text-danger"></small>
                                        </div>


                                        <div class="from-group pt-3">
                                            <label for="">Upload Vedio Track</label>
                                            <input type="file" name="vedio" class="course form-control"
                                                value="{{ $vedio->vedio }}">
                                                <video src="/frontend/storage/vedio/{{ $vedio->vedio }}" controls width="100%"></video>
                                            {{-- <vedio src="/frontend/storage/vedio/{{ $vedio->vedio }}" controls></vedio> --}}
                                        </div>
                                    </div>
                                    <div class="offset-lg-10 col-lg-2 offset-md-10 offset-sm-5 py-5">
                                        <div class="from-group pt-3">

                                            <input type="submit" class="btn btn-primary" value="Update">
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
