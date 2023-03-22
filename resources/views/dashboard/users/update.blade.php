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
                        <li class=""><a href="{{route('user.update')}}">Update</a></li>
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
                            <form method="POST" action="{{route('user.update',$user->id)}}" accept-charset="UTF-8" data-reset="1"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">User Name<sup>*</sup></label>
                                            <input class="form-control require" required="" placeholder="Enter Name"
                                                name="name" type="text" value="{{$user->name}}">
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <div class="form-check mx-5">
                                                <input class="form-check-input" type="radio" name="gender" id="male"  value="male"    {{ ($user->gender=="male")? "checked" : "" }}>
                                                <label class="form-check-label" for="gender" >
                                                 Male
                                              </div>
                                              <div class="form-check mx-5">
                                                <input class="form-check-input" type="radio" name="gender" id="female" value="female"  {{ ($user->gender=="female")? "checked" : "" }}>
                                                <label class="form-check-label" for="gender">
                                                 Female
                                                </label>
                                              </div></div>
                                        {{-- <div class="form-group">
                                            <label for="gender"> Gender<sup>*</sup></label>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input class="custom-control-input" id="male" checked="checked"
                                                    name="gender" type="radio" value="0"  {{ ($user->gender=="0")? "checked" : "" }}>
                                                <label for="male" class="custom-control-label">Male</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input class="custom-control-input" id="female" name="gender" type="radio"
                                                value="1" {{ ($user->gender=="1")? "checked" : "" }}>
                                                <label for="female" class="custom-control-label">Female</label>
                                            </div>
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="email">User Email<sup>*</sup></label>
                                            <input class="form-control require" required="" data-valid="email"
                                                data-error="Invalid Email." placeholder="Enter User Email" name="email"
                                                type="email" value="{{$user->email}}">
                                            <small class="text-danger"></small>
                                        </div>

                                        <div class="form-group">
                                            <label for="mobile">Mobile<sup>*</sup></label>
                                            <input class="form-control require" max-length="12" length="10"
                                                data-length-error="Invalid Mobile Number" required=""
                                                placeholder="Enter Mobile Number" name="mobileNo" type="text" value="{{$user->mobileNo}}"">
                                            <small class="text-danger"></small>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="password">User Password</label>
                                            <input class="form-control require" placeholder="Enter User Password"
                                                name="password" type="password" value="{{$user->password}}" >
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="" >Upload Image</label>
                            <input type="file" name="userimage"  class=" form-control" value="{{$user->userimage}}">
                                                <img src="/frontend/images/users/{{ $user->userimage }}" class="img-fluid py-2" width="100px" height="100px">



                                        </div>
                                    </div>

                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="type">Role</label>
                                            <select class="form-select form-control" name="type">

                                                <option value="0" {{ $user->type == "user" ? 'selected' : '' }}>User</option>
                                                <option value="1" {{ $user->type == "admin" ? 'selected' : '' }}>Admin</option>


                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" rows="4" name="address" cols="50" id="address" >{{$user->address}}</textarea>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="country_id">Select Country</label>

                                                <select class="form-select form-control" name="country_id">
                                                    @foreach ($countries as $country)
                                                    @if($country->id==$user->country_id)
                                                    <option value="{{$country->id}}" selected>{{$country->name}} - {{$country->code}}</option>
                                                    @else
                                                    <option value="{{$country->id}}" selected>{{$country->name}} - {{$country->code}}</option>

                                                            @endif
                                                    @endforeach
                                            </select>

                                        </div>


                                    </div>
                                    <div class="offset-lg-10 col-lg-2 offset-md-10 offset-sm-5">
                                        <div class="form-group">

                                                    <input type="submit" class="btn btn-primary" value="Update">
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
