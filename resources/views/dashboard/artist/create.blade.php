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

                            <form method="POST" action="{{route('artist.create')}}" accept-charset="UTF-8"
                                id="addUpdateArtistForm" enctype="multipart/form-data" data-reset="1" data-modal="1"
                                table-reload="mrclsDtToShowData" data-redirect="/artist"><input name="_token" type="hidden"
                                >
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="artist_name">Artist Name<sup>*</sup></label>
                                            <input class="form-control require" placeholder="Enter Artist Name"
                                                name="name" type="text">
                                            <small class="text-danger"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="dob">Date Of Birth</label>
                                            <div class="input-group">
                                                <input class="form-control autoclose-date" data-language="en"
                                                    placeholder="Enter Date Of Birth" name="DOB" type="date"
                                                    id="dob">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" rows="6" name="desc" placeholder="Enter Description"  cols="50"
                                                id="description"></textarea>
                                            <small class="text-danger"></small>
                                        </div>
                                                                      </div>

                                    <div class="col-lg-6">
                                        <div class="from-group pt-3">
                                            <label for="language_id">Artist Language</label>
                                            <select class="form-select form-control" name="language_id">
                                                <option value="">Select Language</option>
                                                @foreach ($languages as $language)
                                                    <option value="{{ $language->id }}">{{ $language->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
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
                                        <div class="form-group witch-main-block">
                                            <label for="">Upload Image</label>
                            <input type="file" name="artistimage" required class="course form-control">
                                        </div>
                                        <div class="offset-lg-10 col-lg-2 offset-md-10 offset-sm-5 py-5">
                                            <div class="form-group">

                                                <input type="submit" class="btn btn-primary" value="Add">
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
