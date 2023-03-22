@extends('dashboard.layout.main')
@section('dashboardContainer')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-7 col-lg-7">
            <h4 class="page-title">Album</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class=""><a href="{{ url('/admin') }}">Home </a></li>
                    <span>   /   </span>
                    <li class=""><a href="{{ url('/album') }}"> Album</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-5 col-lg-5">
            <div class="widgetbar">
                <a href="{{url('/album/create')}}" class="btn btn-primary-rgba mr-2"><i class="fa-solid fa-file-plus"></i>Create Album</a>
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
                                <h5 class="card-title mb-0">All Album</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="post" id="albumForm">
                                <table data-method="post" id="datatable-buttons"
                                    class="table table-borderless mrclsDtToShowData" data-url="/albums_data">
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
                                            <th>Album Name</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $album)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td> <img src="/frontend/images/album/{{$album->albumimage}}" height="50px" width="50px" alt=""> </td>
                                            <td>{{$album->name}}</td>
                                            <td>{{$album->category}}</td>
                                            @if ($album->status==1)
                                                <td>Active</td>
                                            @else
                                                <td>Unactive</td>
                                            @endif
                                            <td>
                                                {{ \Carbon\Carbon::parse($album->created_at)->diffForhumans() }}
                                                </td>
                                            <td>
                                                <a class="text-danger" href="{{route('album.delete',$album->id)}}">Delete</a> |
                                                <a href="{{route('album.update',$album->id)}}">Update</a> |
                                                <a class="text-success" href="{{route('album.albumlist',$album->id)}}">View</a>
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
