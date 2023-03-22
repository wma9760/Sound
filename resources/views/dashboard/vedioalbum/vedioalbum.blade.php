@extends('dashboard.layout.main')
@section('dashboardContainer')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-7 col-lg-7">
            <h4 class="page-title">vedioalbum</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class=""><a href="{{ url('/admin') }}">Home </a></li>
                    <span>   /   </span>
                    <li class=""><a href="{{ url('/vedioalbum') }}"> vedioalbum</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-5 col-lg-5">
            <div class="widgetbar">
                <a href="{{url('/vedioalbum/create')}}" class="btn btn-primary-rgba mr-2"><i class="fa-solid fa-file-plus"></i>Create vedioalbum </a>

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
                                    <h5 class="card-title mb-0">All vedioalbum</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="post" id="vedioalbumForm">
                                    <table data-method="post" id="datatable-buttons"
                                        class="table table-borderless mrclsDtToShowData" data-url="vedioalbumData">
                                        <thead>
                                            <tr>
                                                <th class="select-checkbox">
                                                    <div class="inline custom-checkbox">
                                                        <input id="checkboxAll" type="checkbox"
                                                            class="custom-control-input selectAllUser"
                                                            onchange="checkAll(this, 'CheckBoxes')">
                                                        <label for="checkboxAll" class="custom-control-label"></label>
                                                    </div>
                                                </th>
                                                <th>Image</th>
                                                <th>Album Title</th>
                                                <th>Language</th>
                                                <th>Song</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $vedioalbum)
                                            <tr>
                                                <td>{{$count++}}</td>
                                                <td> <img src="/frontend/images/album/{{$vedioalbum->albumimage}}" height="50px" width="50px" alt=""> </td>
                                                <td>{{$vedioalbum->albumname}}</td>
                                                <td>{{$vedioalbum->languagename}}</td>
                                                <td>{{$vedioalbum->vedioname}}</td>

                                                <td>
                                                    {{ \Carbon\Carbon::parse($vedioalbum->created_at)->diffForhumans() }}
                                                    </td>
                                                <td>
                                                    <a class="text-danger" href="{{route('vedioalbum.delete',$vedioalbum->id)}}">Delete</a> |
                                                    <a href="{{route('vedioalbum.update',$vedioalbum->id)}}">Update</a> |
                                                     {{-- <a class="text-success" href="{{route('vedioalbum.vedioalbumprofile',$vedioalbum->id)}}">View</a> --}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
