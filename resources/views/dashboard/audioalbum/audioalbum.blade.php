@extends('dashboard.layout.main')
@section('dashboardContainer')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-7 col-lg-7">
            <h4 class="page-title">Audio Album</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class=""><a href="{{ url('/admin') }}">Home </a></li>
                    <span>   /   </span>
                    <li class=""><a href="{{ url('/audioalbum') }}"> Audio Album</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-5 col-lg-5">
            <div class="widgetbar">
                <a href="{{url('/audioalbum/create')}}" class="btn btn-primary-rgba mr-2"><i class="fa-solid fa-file-plus"></i>Create  </a>

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
                                    <h5 class="card-title mb-0">All Audio Albums</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="post" id="audioalbumForm">
                                    <table data-method="post" id="datatable-buttons"
                                        class="table table-borderless mrclsDtToShowData" data-url="audioalbumData">
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
                                            @foreach($data as $audioalbum)
                                            <tr>
                                                <td>{{$count++}}</td>
                                                <td> <img src="/frontend/images/album/{{$audioalbum->albumimage}}" height="50px" width="50px" alt=""> </td>
                                                <td>{{$audioalbum->albumname}}</td>
                                                <td>{{$audioalbum->languagename}}</td>
                                                <td>{{$audioalbum->audioname}}</td>

                                                <td>
                                                    {{ \Carbon\Carbon::parse($audioalbum->created_at)->diffForhumans() }}
                                                    </td>
                                                <td>
                                                    <a class="text-danger" href="{{route('audioalbum.delete',$audioalbum->id)}}">Delete</a> |
                                                    <a href="{{route('audioalbum.update',$audioalbum->id)}}">Update</a> |
                                                     {{-- <a class="text-success" href="{{route('audioalbum.audioalbumprofile',$audioalbum->id)}}">View</a> --}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
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
