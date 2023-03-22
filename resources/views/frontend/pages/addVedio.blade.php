@extends('frontend.layout.main')
@section('mainContainer')
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
                                <h2 class="card-title mb-0">Create Vedio</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="frontend-form">
                            <form method="POST" action="{{ route('home.addVedio') }}" accept-charset="UTF-8" data-reset="1"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <label for="vedio_title">Vedio Title</label><sup class="text-danger">*</sup>
                                            <input class="form-control require" required placeholder="Enter vedio Title"
                                                name="title" type="text">
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="from-group pt-3">
                                            <label for="gnere_id">vedio Gnere<sup>*</sup></label>

                                            <select class="form-select form-control" name="gnere_id" required>
                                                <option value="">Select Gnere</option>
                                                @foreach ($gneres as $gnere)
                                                    <option value="{{ $gnere->id }}">{{ $gnere->name }} </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="from-group pt-3">
                                            <label for="artist_id">Artist<sup>*</sup></label>

                                            <select class="form-select form-control" name="artist_id" required>
                                                <option value="">Select Artsit</option>
                                                @foreach ($artists as $artist)
                                                    <option value="{{ $artist->id }}">{{ $artist->name }} </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="from-group pt-3">
                                            <label for="language_id">vedio Language<sup>*</sup></label>
                                            <select class="form-select form-control" name="language_id" required>
                                                <option value="">Select Language</option>
                                                @foreach ($languages as $language)
                                                    <option value="{{ $language->id }}">{{ $language->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="from-group pt-3 ">
                                            <label for="">Song Cover Image<sup>*</sup></label>
                                            <input type="file" name="vedioimage" required class="course form-control"
                                                required>

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
                                                            id="flexSwitchCheckChecked" name="status" value="">

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
                                                            id="flexSwitchCheckChecked" value="">

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
                                                            id="flexSwitchCheckChecked" name="trending" value="">

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
                                                            id="flexSwitchCheckChecked" name="recommended" value="">

                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="from-group">
                                            <label for="description">Description<sup>*</sup></label>
                                            <textarea class="form-control" rows="5" name="desc" required placeholder="Enter Description" cols="50"
                                                id="description"></textarea>
                                            <small class="text-danger"></small>
                                        </div>


                                        <div class="from-group pt-3">
                                            <label for="">Upload Vedio<sup>*</sup></label>
                                            <input type="file" name="vedio" required class="course form-control">
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
