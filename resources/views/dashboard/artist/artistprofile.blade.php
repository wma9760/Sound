@extends('dashboard.layout.main')
@section('dashboardContainer')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-7">
                <h4 class="page-title">artists</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class=""><a href="{{ url('/admin') }}">Home</a></li>
                        <span> / </span>
                        <li class=""><a href="{{ url('/artistdb') }}">Artists</a></li>
                        <span> / </span>
                        <li class=""><a href="{{ url('/artistprofile') }}">Artist Profile</a></li>
                    </ol>
                </div>
            </div>

            <div class="contentbar">

                <div class="row container-fluid d-flex justify-content-center">
                    <div class="col-xl-10 col-lg-12 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        {{-- {{$dataser->id}} --}}
                                        <div class="m-b-25"> <img src="/frontend/images/artist/{{ $data->artistimage }}"
                                                class="rounded-circle" width="150px" height="150px"
                                                alt="User-Profile-Image"> </div>
                                        <h4 class="f-w-600 text-light">{{$data->name}}</h6>
                                        </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="m-b-10 f-w-600">Description</p>
                                                <h6 class="text-muted f-w-400">{{$data->desc}}</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Date Of Birth</p>
                                            <h6 class="text-muted f-w-400">{{$data->DOB}}</h6>
                                        </div>
                                    </div>
                                    <hr>
                                        <div class="row">


                                            
                                            <div class="form-group switch-main-block">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label for="featured">Featured</label>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-check form-switch mt-2">
                                                            @if ($data->featured == 0)
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="flexSwitchCheckChecked" name="featured"
                                                                    value="{{ $data->featured }}">
                                                            @else
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="flexSwitchCheckChecked" name="featured" checked
                                                                    value="{{ $data->featured }}">
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
                                                            @if ($data->trending == 0)
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="flexSwitchCheckChecked" name="trending"
                                                                    value="{{ $data->trending }}">
                                                            @else
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="flexSwitchCheckChecked" name="trending" checked
                                                                    value="{{ $data->trending }}">
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
                                                            @if ($data->recommended == 0)
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="flexSwitchCheckChecked" name="recommended"
                                                                    value="{{ $data->recommended }}">
                                                            @else
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="flexSwitchCheckChecked" name="recommended" checked
                                                                    value="{{ $data->recommended }}">
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                                <small class="text-danger"></small>
                                            </div>
                                        </div>

                                        <hr>
                                       <div class="row justify-content-center">
                                           <div class="col-md-4">
                                        <a class="text-danger" href="{{route('artist.delete',$data->id)}}">Delete</a> |
                                        <a href="{{route('artist.update',$data->id)}}">Update</a>
                                    </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
