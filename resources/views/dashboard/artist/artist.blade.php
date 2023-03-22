@extends('dashboard.layout.main')
@section('dashboardContainer')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-7 col-lg-7">
            <h4 class="page-title">Artist</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class=""><a href="{{ url('/admin') }}">Home </a></li>
                    <span>   /   </span>
                    <li class=""><a href="{{ url('/artist') }}">Artist</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-5 col-lg-5">
            <div class="widgetbar">
                <a href="{{url('/artist/create')}}" class="btn btn-primary-rgba mr-2"><i class="fa-solid fa-file-plus"></i>Create Artist</a>
                
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
                            <h5 class="card-title mb-0">All Artist</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" id="artistForm">
                            <table data-method="post" id="datatable-buttons"
                                class="table table-borderless mrclsDtToShowData" data-url="artist_data">
                                <thead>
                                    <tr>
                                        <th class="select-checkbox">
                                            <div class="inline custom-checkbox">
                                                <input id="checkboxAll" type="checkbox"
                                                    class="custom-control-input selectAllartist"
                                                    onchange="checkAll(this, 'CheckBoxes')">
                                                <label for="checkboxAll" class="custom-control-label"></label>
                                            </div>
                                        </th>
                                        <th>Image</th>
                                        <th>Artist Name</th>
                                        <th>Date Of Birth</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                @foreach($data as $artist)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td> <img src="/frontend/images/artist/{{$artist->artistimage}}" height="50px" width="50px" alt=""> </td>
                                    <td>{{$artist->name}}</td>
                                    <td>{{$artist->DOB}}</td>
                                    @if ($artist->status==1)
                                        <td>Active</td>
                                    @else
                                        <td>Unactive</td>
                                    @endif
                                    <td>
                                        {{ \Carbon\Carbon::parse($artist->created_at)->diffForhumans() }}
                                        </td>
                                    <td>
                                        <a class="text-danger" href="{{route('artist.delete',$artist->id)}}">Delete</a> | 
                                        <a href="{{route('artist.update',$artist->id)}}">Update</a> | 
                                        <a class="text-success" href="{{route('artist.artistprofile',$artist->id)}}">View</a>
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
