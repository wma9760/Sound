@extends('dashboard.layout.main')
@section('dashboardContainer')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-7 col-lg-7">
            <h4 class="page-title">Vedio</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class=""><a href="{{ url('/admin') }}">Home </a></li>
                    <span>   /   </span>
                    <li class=""><a href="{{ url('/vedio') }}"> Vedio</a></li>
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
                                <h5 class="card-title mb-0">All Vedio</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="post" id="vedioForm">
                                <table data-method="post" id="datatable-buttons"
                                    class="table table-borderless mrclsDtToShowData" data-url="vedioData">
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
                                            <th>Vedio Title</th>
                                            <th>Vedio Genres</th>
                                            <th>Artist Name</th>
                                            <th>Language</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th style="width: 200px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $vedio)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td> <img src="/frontend/images/vedio/{{$vedio->vedioimage}}" height="50px" width="50px" alt=""> </td>
                                            <td>{{$vedio->title}}</td>
                                            <td>{{$vedio->gnerename}}</td>
                                            <td>{{$vedio->artistname}}</td>
                                            <td>{{$vedio->laguagename}}</td>
                                            @if ($vedio->status==1)
                                                <td>Active</td>
                                            @else
                                                <td>Unactive</td>
                                            @endif
                                            <td>
                                                {{ \Carbon\Carbon::parse($vedio->created_at)->diffForhumans() }}
                                                </td>
                                            <td style="width: 200px;">
                                                <a class="text-danger" href="{{route('vedio.delete',$vedio->id)}}">Delete</a> |
                                                <a href="{{route('vedio.aprove',$vedio->id)}}">Aprove</a>
                                                {{-- <a class="text-success" href="{{route('vedio.vedioprofile',$vedio->id)}}">View</a> --}}
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
