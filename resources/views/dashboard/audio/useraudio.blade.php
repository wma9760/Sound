@extends('dashboard.layout.main')
@section('dashboardContainer')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-7 col-lg-7">
            <h4 class="page-title">Audio</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class=""><a href="{{ url('/admin') }}">Home </a></li>
                    <span>   /   </span>
                    <li class=""><a href="{{ url('/audio') }}"> Audio</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-5 col-lg-5">
            <div class="widgetbar">
                
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
                                <h5 class="card-title mb-0">All audio</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="post" id="audioForm">
                                <table data-method="post" id="datatable-buttons"
                                    class="table table-borderless mrclsDtToShowData" data-url="audioData">
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
                                            <th>Audio Title</th>
                                            <th>Audio Genres</th>
                                            <th>Artist Name</th>
                                            <th>Language</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th style="width: 200px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $audio)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td> <img src="/frontend/images/audio/{{$audio->audioimage}}" height="50px" width="50px" alt=""> </td>
                                            <td>{{$audio->title}}</td>
                                            <td>{{$audio->gnerename}}</td>
                                            <td>{{$audio->artistname}}</td>
                                            <td>{{$audio->laguagename}}</td>
                                            @if ($audio->status==1)
                                                <td>Active</td>
                                            @else
                                                <td>Unactive</td>
                                            @endif
                                            <td>
                                                {{ \Carbon\Carbon::parse($audio->created_at)->diffForhumans() }}
                                                </td>
                                            <td style="width: 200px;">
                                                <a class="text-danger" href="{{route('audio.delete',$audio->id)}}">Delete</a> | 
                                                <a href="{{route('audio.aprove',$audio->id)}}">Aprove</a>
                                                {{-- <a class="text-success" href="{{route('audio.audioprofile',$audio->id)}}">View</a> --}}
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
