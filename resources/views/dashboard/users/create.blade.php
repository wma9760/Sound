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
                        <li class=""><a href="{{ url('/userdb') }}">Users</a></li>
                        <span> / </span>
                        <li class=""><a href="{{ url('/userdbcreate') }}">Create</a></li>
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
                        <div class="text-right">
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title mb-0">Users</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="admin-form">
                            <form method="POST" action="{{route('user.create')}}" accept-charset="UTF-8" data-reset="1"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">User Name<sup>*</sup></label>
                                            <input class="form-control require" required placeholder="Enter Name"
                                                name="name" type="text">
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <div class="form-check mx-5">
                                            <input class="form-check-input" type="radio" name="gender" id="male"  value="male" checked>
                                            <label class="form-check-label" for="gender" checked>
                                             Male
                                            </label>
                                          </div>
                                          <div class="form-check mx-5">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                            <label class="form-check-label" for="gender">
                                             Female
                                            </label>
                                          </div></div>
                                        <div class="form-group">
                                            <label for="email">User Email<sup>*</sup></label>
                                            <input class="form-control require" required data-valid="email"
                                                data-error="Invalid Email." placeholder="Enter User Email" name="email"
                                                type="email">
                                            <small class="text-danger"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="mobile">Mobile<sup>*</sup></label>
                                            <input class="form-control require" max-length="12" length="10"
                                                data-length-error="Invalid Mobile Number" required
                                                placeholder="Enter Mobile Number" name="mobileNo" type="text">
                                            <small class="text-danger"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Upload Image</label>
                            <input type="file" name="userimage" required class="course form-control">

                                           </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="type">Role</label>
                                            <select class="form-select form-control" name="type">
                                                <option value=0>User</option>
                                                <option value=1>Admin</option>
                                                {{-- <option value="2">Manager</option> --}}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" rows="4" required name="address" cols="50" id="address"></textarea>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="country_id">Select Country</label>

                                                <select class="form-select form-control" name="country_id">
                                                    @foreach ($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name}} - {{$country->code}}</option>
                                                    @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="password">User Password</label>
                                            <input class="form-control require" placeholder="Enter User Password"
                                                name="password" type="password" value="">
                                        </div>

                                    </div>
                                    <div class="offset-lg-10 col-lg-2 offset-md-10 offset-sm-5">
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
    </div>
@endsection
