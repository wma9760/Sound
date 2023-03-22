@extends('dashboard.layout.main')
@section('dashboardContainer')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-7">
                <h4 class="page-title">Users</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class=""><a href="{{ url('/admin') }}">Home </a></li>
                        <span>   /   </span>
                        <li class=""><a href="{{ url('/userdb') }}"> Users</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-5 col-lg-5">
                <div class="widgetbar">
                    <a href="{{url('/userdbcreate')}}" class="btn btn-primary-rgba mr-2"><i class="fa-solid fa-file-plus"></i>Create User</a>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="contentbar">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title mb-0">All Users</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="post" id="usersForm">
                                <table data-method="post" id="datatable-buttons"
                                    class="table table-borderless mrclsDtToShowData" data-url="usersData">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Country</th>
                                            <th>Created At</th>
                                            <th style="width: 200px;">Action</th>
                                        </tr>
                                       
                                        @foreach($data as $u)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td> <img src="frontend/images/users/{{$u->userimage}}" height="50px" width="50px" alt=""> </td>
                                            <td>{{$u->name}}</td>
                                            <td>{{$u->email}}</td>
                                            <td>{{$u->gender}}</td>
                                          
                                            <td>{{$u->countriesname}}</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($u->created_at)->diffForhumans() }}
                                                </td>
                                            <td style="width: 200px;">
                                                <a class="text-danger" href="{{route('user.delete',$u->id)}}">Delete</a> | 
                                                <a href="{{url('/userupdate',$u->id)}}">Update</a> | 
                                                <a class="text-success" href="{{route('user.userprofile',$u->id)}}">View</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </thead>
                                </table>
                                {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
