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
                            <form method="POST"  action="{{route('album.create')}}"
                                accept-charset="UTF-8" data-reset="1"  enctype="multipart/form-data">
@csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <label for="album_title">Album Title<sup>*</sup></label>
                                            <input class="form-control require" required placeholder="Enter album Title"
                                                name="name" type="text">
                                            <small class="text-danger"></small>
                                        </div>

                                        <div class="from-group pt-3">
                                            <label for="category">Category</label>

                                            <select class="form-select form-control" name="category">
                                                <option value="">Select category</option>
                                                <option value="audio">Audio</option>
                                                <option value="vedio">Vedio</option>
                                            </select>

                                        </div>

                                        <div class="from-group pt-3 ">
                                            <label for="">Album Cover Image</label>
                                            <input type="file" name="albumimage" required class="course form-control">

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
                                                id="description"></textarea>
                                            <small class="text-danger"></small>
                                        </div>

{{--                                         input

                                        <div class="from-group pt-3">
                                            <label for="">Upload album</label>
                                            <input type="file" name="songs[]" multiple required class="course form-control">
                                        </div> --}}
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
