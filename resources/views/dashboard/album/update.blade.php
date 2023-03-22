@extends('dashboard.layout.main ')
@section('dashboardContainer')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-7">
                <h4 class="page-title">Album</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class=""><a href="{{ url('/admin') }}">Home</a></li>
                        <span> / </span>
                        <li class=""><a href="{{ url('/album') }}">Album</a></li>
                        <span> / </span>
                        <li class=""><a href="{{ url('/album/create') }}">Create</a></li>
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
                            <form method="POST"  action="{{ route('album.update',$album->id) }}"
                                accept-charset="UTF-8" data-reset="1"  enctype="multipart/form-data">
@csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <label for="album_title">Album Title<sup>*</sup></label>
                                            <input class="form-control require" required="" placeholder="Enter album Title"
                                                name="name" type="text" value="{{$album->name}}">
                                            <small class="text-danger"></small>
                                        </div>

                                        <div class="from-group pt-3">
                                            <label for="categoy">Album Category</label>

                                            <select class="form-select form-control" name="category" required><sup>*</sup>
                                                <option value="">Select Category</option>
                                                @if($album->category=="audio")
                                                <option value="{{$album->category }}" selected>Audio</option>
                                                @else
                                                <option value="vedio" selected>Vedio</option>

                                                        @endif
                                            </select>

                                        </div>

                                        <div class="form-group pt-3">
                                            <label for="" >Upload Image</label>
                                            <input type="file" name="albumimage"  class=" form-control" value="{{$album->albumimage}}">
                                            <img src="/frontend/images/album/{{ $album->albumimage }}" class="img-fluid py-2" width="100px" height="100px">
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
                                                        @if ($album->status == 0)
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="status"
                                                                value="{{ $album->status }}">
                                                        @else
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="status" checked
                                                                value="{{ $album->status }}">
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
                                                        @if ($album->featured == 0)
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="featured"
                                                                value="{{ $album->featured }}">
                                                        @else
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="featured" checked
                                                                value="{{ $album->featured }}">
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
                                                        @if ($album->trending == 0)
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="trending"
                                                                value="{{ $album->trending }}">
                                                        @else
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="trending" checked
                                                                value="{{ $album->trending }}">
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
                                                        @if ($album->recommended == 0)
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="recommended"
                                                                value="{{ $album->recommended }}">
                                                        @else
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="recommended" checked
                                                                value="{{ $album->recommended }}">
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="from-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" rows="5" name="desc" placeholder="Enter Description"  cols="50"
                                                id="description">{{$album->desc}}</textarea>
                                            <small class="text-danger"></small>
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
