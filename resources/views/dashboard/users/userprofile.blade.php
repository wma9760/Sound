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
                        <li class=""><a href="{{ url('/userprofile') }}">User Profile</a></li>
                    </ol>
                </div>
            </div>

            <div class="contentbar">

                {{-- <div class="page-content page-container" id="page-content"> --}}
                {{-- <div class="padding"> --}}
                @foreach ($data as $u)
                @endforeach
                <div class="row container-fluid d-flex justify-content-center">
                    <div class="col-xl-10 col-lg-12 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        {{-- {{$user->id}} --}}
                                        <div class="m-b-25"> <img src="/frontend/images/users/{{ $u->userimage }}"
                                                class="rounded-circle" width="150px" height="150px"
                                                alt="User-Profile-Image"> </div>
                                        <h4 class="f-w-600 text-light">{{$u->name}}</h6>
                                        </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Email</p>
                                                <h6 class="text-muted f-w-400">{{$u->email}}</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Phone</p>
                                                <h6 class="text-muted f-w-400">{{$u->mobileNo}}</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Gender</p>
                                                @if ($u->gender==1)
                                                    
                                                <h6 class="text-muted f-w-400">Female</h6>
                                                @else
                                                <h6 class="text-muted f-w-400">Male</h6>
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">ROle</p>
                                                <h6 class="text-muted f-w-400">{{$u->type}}</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Address</p>
                                                <h6 class="text-muted f-w-400"> {{$u->address}}</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Country</p>
                                                <h6 class="text-muted f-w-400">{{$u->countriesname}}</h6>
                                            </div>
                                        </div>
                                        <hr>
                                       <div class="row justify-content-center">
                                           <div class="col-md-4">
                                        <a class="text-danger" href="{{route('user.delete',$u->id)}}">Delete</a> | 
                                        <a href="{{url('/userupdate',$u->id)}}">Update</a> 
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
