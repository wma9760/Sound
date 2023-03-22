@extends('dashboard.layout.main ')
@section('dashboardContainer')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-7">
                <h4 class="page-title">vedioalbum</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class=""><a href="{{ url('/admin') }}">Home</a></li>
                        <span> / </span>
                        <li class=""><a href="{{ url('/vedioalbum') }}">vedioalbum</a></li>
                        <span> / </span>
                        <li class=""><a href="{{ url('/vedioalbum/create') }}">Create</a></li>
                    </ol>
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
                                <h5 class="card-title mb-0">Create vedioalbum</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="admin-form">
                            <form method="POST"  action="{{ route('vedioalbum.update',$vedioalbum->id) }}" 
                                accept-charset="UTF-8" data-reset="1"  enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-lg-12">
       
        <div class="from-group pt-3">
            <label for="album_id">Album</label>

            <select class="form-select form-control" name="album_id">
                <option value="">Select Album</option>
                @foreach ($albums as $album)
                   @if ($album->id==$vedioalbum->album_id)
                   <option value="{{ $album->id }}" selected>{{ $album->name }} </option>
                   @else
                   <option value="{{ $album->id }}" selected>{{ $album->name }} </option>
                   @endif
                @endforeach
            </select>

        </div>
        <div class="from-group pt-3">
            <label for="vedio_id">vedio</label>

            <select class="form-select form-control" name="vedio_id">
                <option value="">Select vedio</option>
                @foreach ($vedioes as $vedio)
                @if ($vedio->id==$vedioalbum->vedio_id)
                <option value="{{ $vedio->id }}" selected>{{ $vedio->title }} </option>
                @else
                <option value="{{ $vedio->id }}" selected>{{ $vedio->title }} </option>   
                @endif
                @endforeach
            </select>

        </div>
        <div class="from-group pt-3">
            <label for="language_id">vedioalbum Language</label>
            <select class="form-select form-control" name="language_id">
                <option value="">Select Language</option>
                @foreach ($languages as $language)
                @if($language->id==$vedioalbum->language_id)
                <option value="{{ $language->id }}" selected>{{ $language->name }} </option>
                @else 
                <option value="{{ $language->id }}" selected>{{ $language->name }} </option>
                @endif  
                @endforeach
            </select>
        </div>
    
    <div class="offset-lg-10 col-lg-2 offset-md-10 offset-sm-5 py-5">
        <div class="from-group pt-3">

            <input type="submit" class="btn btn-primary" value="Add">
        </div>
        {{-- <div class="clear-both"></div> --}}
    </div>
</div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
