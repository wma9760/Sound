
      @extends('frontend.layout.main')
      @section('mainContainer')
      <div class="containerbar">
        <div class="ms_featured_slider padder_top20">
            <div class="ms_heading">
                <h1> Gnere</h1>
            </div>
<div class="row">
    @foreach ($gnere as $gnere)
    <div class="col-lg-4">

        <a href="{{ route('gnere.view', $gnere->id) }}">

            <div class="ms_rcnt_box">
                <div class="ms_rcnt_box_img">
                    <img src="/frontend/images/gnere/{{ $gnere->gnereimage }}" alt="" class="img-fluid"
                        width="100%">
                    <div class="ms_main_overlay">
                        <div class="ms_box_overlay"></div>
                        <div class="ms_more_icon">
                            <img src="{{ url('frontend/assets/images/svg/more.svg') }}" alt="">
                        </div>


                    </div>
                </div>
                <div class="ms_rcnt_box_text">
                    <h3><a href="{{ route('gnere.view', $gnere->id) }}">{{ $gnere->name }}</a></h3>
                </div>
            </div>
        </a>
    </div>
@endforeach</div>
    </div>

        @endsection