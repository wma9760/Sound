
  @extends('frontend.layout.main')
@section('mainContainer')
<div class="contentbar">
<div class="player-wrapper container-fluid">

        <video poster="{{$data->vedioimage}}" class="js-player" id="myVideo"
          autoplay controls  width="100%">
            <source src="/frontend/storage/vedio/{{$data->vedio}}"/></video>
            </div>


      @php
      $rate_number=number_format($rating_value)
  @endphp
  <div class="row m-2">
    <div class="col-10">
      <span class="mt-2" id="star">
        <span class="text-">

            @for ($i =1; $i <=$rate_number ; $i++)
            <i class="fa fa-star star_checked s" ></i>
            @endfor
            @for ($j =$rate_number+1 ; $j <=5 ; $j++)

            <i class="fa fa-star star_uncheckedvedio " ></i>
            @endfor
            @if ($rating->count()>0)

                <small>Ratings {{$rating->count()}}</small>

            @else
            <small>No Ratings</small>

            @endif
        </span>
      </span>
    </div>
    <div class="col-2">

      <a href="javascript:;" class=" btn btn-outline-info  "
     data-toggle="modal" data-target="#vedio_rate"><span>Rate Track</span></a>
    </div>
  </div>



  <div class="row mt-4">
    <div class="col-lg-12">
        <div class="card m-b-30">

            <div class="card-body" id="form-card-body">
                <div class="frontend-form">

                    <form method="POST" action="{{ route('vediocomment.add') }}"accept-charset="UTF-8"
                        id="addUpdateArtistForm" enctype="multipart/form-data" data-reset="1" data-modal="1"
                        table-reload="mrclsDtToShowData" data-redirect="/artist">

                        @csrf
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="form-group">
                                    <input type="hidden" name="track_id" value="{{ $data->id }}" />

                                    <label for="description"><h4>Leave a Comment</h4></label>
                                    <textarea class="form-control" rows="4" name="comment" required placeholder="Enter Comment"  cols="50"
                                        id="description"></textarea>
                                    <small class="text-danger"></small>
                                </div>

                            </div>


                                <div class="offset-lg-10 col-lg-2 mt-2 offset-md-10 offset-sm-5">
                                    <div class="form-group">

                                        <input type="submit" class="btn btn-primary" value="Add">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                @include('frontend.vedioreplies', ['comments' => $data->comments, 'track_id' => $data->id])
    </div>

</div>
    <div class="ms_lang_popup">
      <div id="vedio_rate" class="modal  centered-modal" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                  <button type="button" class="close" data-dismiss="modal">
                      <i class="fa_icon form_close"></i>
                  </button>
                  <div class="modal-body">
                      <div class="ms_share_img">
                              <img src="/frontend/images/vedio/{{ $data->vedioimage }}" class="img-fluid"
                                  alt="Playlist">
                      </div>
                      <div class="ms_share_text">
                          <h1>Rate: {{ $data->title }}</h1>
                          <form action="{{ route('rating.vedio') }}" method="POST" class="form-group post">
                              @csrf
                              <input type="hidden" name="track_id" value="{{ $data->id }}">
                              <div class="ms_top_lang">

                                  <div class="rating-css">
                                      <div class="star-icon">
                                          <input type="radio" value="1" name="stars_rated" checked id="rating1">
                                          <label for="rating1" class="fa fa-star"></label>
                                          <input type="radio" value="2" name="stars_rated" id="rating2">
                                          <label for="rating2" class="fa fa-star"></label>
                                          <input type="radio" value="3" name="stars_rated" id="rating3">
                                          <label for="rating3" class="fa fa-star"></label>
                                          <input type="radio" value="4" name="stars_rated" id="rating4">
                                          <label for="rating4" class="fa fa-star"></label>
                                          <input type="radio" value="5" name="stars_rated" id="rating5">
                                          <label for="rating5" class="fa fa-star"></label>
                                      </div>
                                  </div>


                              </div>
                              <input type="submit" class="btn btn-outline-dark mt-3" value="Rate">
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      {{-- ENdrating --}}
  </div>
</div>
@endsection