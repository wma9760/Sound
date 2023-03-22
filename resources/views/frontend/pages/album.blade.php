
      @extends('frontend.layout.main')
      @section('mainContainer')
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Audio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Vedio</a>
        </li>

      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="ms_featured_slider padder_top20">
          <div class="ms_heading">
              <h1>Featured Audio Albums</h1>
          </div>

          <div class="items row">
            @foreach ($featured as $album)


            <div class="col-lg-4">

                <a href="{{ route('home.albumviewaudio', $album->id) }}">

                <div class="ms_rcnt_box">
                    <div class="ms_rcnt_box_img">
                        <img src="/frontend/images/album/{{ $album->albumimage }}" alt="" class="img-fluid"
                            width="100%">
                        <div class="ms_main_overlay">
                            <div class="ms_box_overlay"></div>
                            <div class="ms_more_icon">
                                <img src="{{ url('frontend/assets/images/svg/more.svg') }}" alt="">
                            </div>


                        </div>
                    </div>
                    <div class="ms_rcnt_box_text">
                        <h3><a href="">{{ $album->name }}</a></h3>
                    </div>
                </div>
                </a>
            </div>

            @endforeach

        </div>

      </div>
  </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="ms_featured_slider padder_top20">
            <div class="ms_heading">
                <h1>Featured Vedio Albums</h1>
            </div>

            <div class="items row">
              @foreach ($featured_v as $album)


              <div class="col-lg-4">

                <a href="{{ route('home.albumviewvedio', $album->id) }}">

                  <div class="ms_rcnt_box">
                      <div class="ms_rcnt_box_img">
                          <img src="/frontend/images/album/{{ $album->albumimage }}" alt="" class="img-fluid"
                              width="100%">
                          <div class="ms_main_overlay">
                              <div class="ms_box_overlay"></div>
                              <div class="ms_more_icon">
                                  <img src="{{ url('frontend/assets/images/svg/more.svg') }}" alt="">
                              </div>


                          </div>
                      </div>
                      <div class="ms_rcnt_box_text">
                          <h3><a href="">{{ $album->name }}</a></h3>
                      </div>
                  </div>
                  </a>
              </div>

              @endforeach

          </div>

        </div>

        </div>
      </div>
        @endsection