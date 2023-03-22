@extends('dashboard.layout.main')
@section('dashboardContainer')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-7 col-lg-7">
            <h4 class="page-title">Gneres</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class=""><a href="{{ url('/admin') }}">Home</a></li>
                    <span> / </span>
                    <li class=""><a href="{{ url('/gnere') }}">Gnere</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-5 col-lg-5">
            <div class="widgetbar">
                <a href="{{url('/gnere/create')}}" class="btn btn-primary-rgba mr-2"><i class="fa-solid fa-file-plus"></i>Create Gnere</a>
                
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
                            <h5 class="card-title mb-0">All Gneres</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" id="gnereDataForm">
                            <table id="datatable-buttons"
                                class="table table-borderless mrclsDtToShowData sortDataOfTable" data-method="post">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="inline custom-checkbox">
                                                <input id="checkboxAll" type="checkbox"
                                                    class="custom-control-input selectAllgnere"
                                                    onchange="checkAll(this, 'CheckBoxes')">
                                                <label for="checkboxAll" class="custom-control-label"></label>
                                            </div>
                                        </th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $gnere)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td> <img src="/frontend/images/gnere/{{ $gnere->gnereimage }}" height="50px"
                                                    width="100px" alt=""> </td>
                                            <td>{{ $gnere->name }}</td>
                                            @if ($gnere->status==1)
                                            <td>Active</td>
                                        @else
                                            <td>Unactive</td>
                                        @endif
                                            <td>
                                                {{ \Carbon\Carbon::parse($gnere->created_at)->diffForhumans() }}
                                            </td>
                                            <td style="width: 200px;">
                                                <a class="text-danger"
                                                    href="{{ route('gnere.delete', $gnere->id) }}">Delete</a> |
                                                <a href="{{ route('gnere.update', $gnere->id) }}">Update</a> 
                                                
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