@extends('dashboard.layout.main')
@section('dashboardContainer')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Create Artist</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Artist</a></li>
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
                                <h5 class="card-title mb-0">Create Artist</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="admin-form">

                            <form method="POST" action="{{ route('artist.update', $artist->id) }}" accept-charset="UTF-8"
                                id="addUpdateArtistForm" enctype="multipart/form-data" data-reset="1" data-modal="1"
                                table-reload="mrclsDtToShowData" data-redirect="/artist"><input name="_token" type="hidden">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="artist_name">Artist Name<sup>*</sup></label>
                                            <input class="form-control require" placeholder="Enter Artist Name" name="name"
                                                type="text" value="{{ $artist->name }}">
                                            <small class="text-danger"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="dob">Date Of Birth</label>
                                            <div class="input-group">
                                                <input class="form-control autoclose-date" data-language="en"
                                                    placeholder="Enter Date Of Birth" name="DOB" value="{{ $artist->DOB }}"
                                                    type="date" id="dob">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" rows="6" name="desc" placeholder="Enter Description" cols="50"
                                                id="description">{{ $artist->desc }}</textarea>
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="from-group pt-3">
                                            <label for="language_id">Artist Language</label>
                                            <select class="form-select form-control" name="language_id">
                                                <option value="">Select Language</option>
                                                @foreach ($languages as $language)
                                                @if($language->id==$artist->language_id)
                                                <option value="{{ $language->id }}" selected>{{ $language->name }} </option>
                                                @else
                                                <option value="{{ $language->id }}" >{{ $language->name }} </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group switch-main-block">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="status">Status</label>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-check form-switch mt-2">
                                                        @if ($artist->status == 0)
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="status"
                                                                value="{{ $artist->status }}">
                                                        @else
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="status" checked
                                                                value="{{ $artist->status }}">
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
                                                        @if ($artist->featured == 0)
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="featured"
                                                                value="{{ $artist->featured }}">
                                                        @else
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="featured" checked
                                                                value="{{ $artist->featured }}">
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
                                                        @if ($artist->trending == 0)
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="trending"
                                                                value="{{ $artist->trending }}">
                                                        @else
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="trending" checked
                                                                value="{{ $artist->trending }}">
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
                                                        @if ($artist->recommended == 0)
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="recommended"
                                                                value="{{ $artist->recommended }}">
                                                        @else
                                                            <input class="form-check-input" type="checkbox"
                                                                id="flexSwitchCheckChecked" name="recommended" checked
                                                                value="{{ $artist->recommended }}">
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Upload Image</label>
                                            <input type="file" name="artistimage" class=" form-control"
                                                value="{{ $artist->artistimage }}">
                                            <img src="/frontend/images/artist/{{ $artist->artistimage }}"
                                                class="img-fluid py-2" width="200px">



                                        </div>
                                        <div class="offset-lg-10 col-lg-2 offset-md-10 offset-sm-5 py-5">
                                            <div class="form-group">

                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </div>
                                            <div class="clear-both"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
