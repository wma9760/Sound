@extends('dashboard.layout.main')
@section('dashboardContainer')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-7">
                <h4 class="page-title">Users</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class=""><a href="{{ url('/admin') }}">Home</a></li>
                        <span> / </span>
                        <li class=""><a href="{{ url('/gnere/gneredb') }}">Gnere</a></li>
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
                                <h5 class="card-title mb-0">Gnere</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="admin-form">
                            <form method="POST" action="{{ route('gnere.update',$gnere->id) }}" accept-charset="UTF-8" data-reset="1"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2">
                                        <div class="form-group">
                                            <label for="name">Name<sup>*</sup></label>
                                            <input class="form-control require" required="" placeholder="Enter Name"
                                                name="name" type="text" value="{{$gnere->name}}">
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="form-group pt-3">
                                            <label for="" >Upload Image</label>
                                            <input type="file" name="gnereimage"  class=" form-control" value="{{$gnere->gnereimage}}">
                                            <img src="/frontend/images/gnere/{{ $gnere->gnereimage }}" class="img-fluid py-2" width="300px" height="70px">
                                        </div>
                                    {{-- </div> --}}
                                    <div class="form-group switch-main-block">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="status">Status</label>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-check form-switch mt-2">
                                                    @if ($gnere->status == 0)
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked" name="status"
                                                            value="{{ $gnere->status }}">
                                                    @else
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked" name="status" checked
                                                            value="{{ $gnere->status }}">
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <small class="text-danger"></small>
                                    </div>
                                    <div class="offset-lg-5 py-3  col-lg-2 offset-md-10 offset-sm-5">
                                        <div class="form-group">


                                            {{-- <button type="button" class="btn btn-primary" data-action="submitThisForm"></button> --}}
                                                    <input type="submit" class="btn btn-primary" value="Add">
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="contentbar">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">

                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title mb-0">Gnere</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="admin-form">
                            <form method="POST" action="{{ route('gnere.update',$gnere->id) }}" accept-charset="UTF-8" data-reset="1"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Name<sup>*</sup></label>
                                            <input class="form-control require" required="" placeholder="Enter Name"
                                                name="name" type="text" value="{{$gnere->name}}">
                                            <small class="text-danger"></small>
                                        </div>

                                    </div>

                                    <div class="offset-lg-5 py-3  col-lg-2 offset-md-10 offset-sm-5">
                                        <div class="form-group">


                                                    <input type="submit" class="btn btn-primary" value="Add">
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
