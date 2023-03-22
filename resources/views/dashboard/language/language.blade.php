@extends('dashboard.layout.main')
@section('dashboardContainer')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-7 col-lg-7">
            <h4 class="page-title">Languages</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class=""><a href="{{ url('/admin') }}">Home</a></li>
                    <span> / </span>
                    <li class=""><a href="{{ url('/language') }}">Language</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-5 col-lg-5">
            <div class="widgetbar">
                <a href="{{url('/language/create')}}" class="btn btn-primary-rgba mr-2"><i class="fa-solid fa-file-plus"></i>Create language</a>
                
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
                            <h5 class="card-title mb-0">All Languages</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" id="languagesForm">
                            <table data-method="post" id="datatable-buttons"
                                class="table table-borderless mrclsDtToShowData" data-url="languagesData">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                   
                                    @foreach($data as $language)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$language->name}}</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($language->created_at)->diffForhumans() }}
                                            </td>
                                        <td>
                                            <a class="text-danger" href="{{url('/language/delete',$language->id)}}">Delete</a> | 
                                            <a href="{{url('/language/update',$language->id)}}">Update</a> | 
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