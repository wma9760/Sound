@extends('frontend.layout.main')
@section('mainContainer')
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show"">
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
                            <div class="col-6 p-2">
                                <h2 class="card-title mb-0">Create Audio</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="frontend-form">
                            <form method="POST"  action="{{route('home.addAudio')}}"
                                accept-charset="UTF-8" data-reset="1"  enctype="multipart/form-data">
@csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="from-group pt-3">
                                            <label for="Audio_title">Audio Title</label>
                                            <input class="form-control require  @error('title') is-invalid @enderror" required value="{{old('name')}}" placeholder="Enter Audio Title"
                                                name="title" type="text">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="from-group pt-3">
                                            <label for="gnere_id">Audio Gnere</label>

                                            <select class="form-select form-control" required name="gnere_id">
                                                <option value="">Select Gnere</option>
                                                @foreach ($gneres as $gnere)
                                                    <option value="{{ $gnere->id }}">{{ $gnere->name }} </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="from-group pt-3">
                                            <label for="artist_id">Artist</label>

                                            <select class="form-select form-control"  required name="artist_id">
                                                <option value="">Select Artsit</option>
                                                @foreach ($artists as $artist)
                                                    <option value="{{ $artist->id }}">{{ $artist->name }} </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="from-group pt-3">
                                            <label for="language_id">Audio Language</label>
                                            <select class="form-select form-control"required  name="language_id">
                                                <option value="">Select Language</option>
                                                @foreach ($languages as $language)
                                                    <option value="{{ $language->id }}">{{ $language->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="from-group pt-3 ">
                                            <label for="">Song Cover Image</label>
                                            <input type="file" name="audioimage" required
                                            class="course form-control @error('audioimage') is-invalid @enderror">
                                            @error('audioimage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                                            <textarea class="form-control require @error('desc') is-invalid @enderror" rows="4" required name="desc" placeholder="Enter Description"  cols="50"
                                                id="description"></textarea>
                                                @error('desc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-danger"></small>
                                        </div>


                                        <div class="from-group pt-3">
                                            <label for="">Upload Audio</label>
                                            <input type="file" name="audio" required class="course form-control @error('audio') is-invalid @enderror" >
                                            @error('audio')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
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
            {{-- </div> --}}


@endsection
