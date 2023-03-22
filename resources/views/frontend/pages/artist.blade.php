@extends('frontend.layout.main')
@section('mainContainer')
    <div class="ms_featured_slider padder_top20">
        <div class="ms_heading">
            <h1>Featured Artists</h1>
        </div>

        <div class="items row">
            @foreach ($featured as $artist )

            <div class="col-lg-4">

                <a href="{{ route('artist.view', $artist->id) }}">

                    <div class="ms_rcnt_box">
                        <div class="ms_rcnt_box_img">
                            <img src="/frontend/images/artist/{{ $artist->artistimage }}" alt="" class="img-fluid"
                                width="100%">
                            <div class="ms_main_overlay">
                                <div class="ms_box_overlay"></div>
                                <div class="ms_more_icon">
                                    <img src="{{ url('frontend/assets/images/svg/more.svg') }}" alt="">
                                </div>


                            </div>
                        </div>
                        <div class="ms_rcnt_box_text">
                            <h3><a href="../artist/single/5/dahlia-doyle.html">{{ $artist->name }}</a></h3>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach


        </div>

    </div>
    <div class="ms_featured_slider padder_top20">
        <div class="ms_heading">
            <h1>Trending Artists</h1>
        </div>

        <div class="items row">
            @foreach ($trending as $artist)
                <div class="col-lg-4">

                    <a href="{{ route('artist.view', $artist->id) }}">

                        <div class="ms_rcnt_box">
                            <div class="ms_rcnt_box_img">
                                <img src="/frontend/images/artist/{{ $artist->artistimage }}" alt="" class="img-fluid"
                                    width="100%">
                                <div class="ms_main_overlay">
                                    <div class="ms_box_overlay"></div>
                                    <div class="ms_more_icon">
                                        <img src="{{ url('frontend/assets/images/svg/more.svg') }}" alt="">
                                    </div>


                                </div>
                            </div>
                            <div class="ms_rcnt_box_text">
                                <h3><a href="../artist/single/5/dahlia-doyle.html">{{ $artist->name }}</a></h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>

    </div>
    <div class="ms_featured_slider padder_top20">
        <div class="ms_heading">
            <h1>Recommended Artists</h1>
        </div>

        <div class="items row">
            @foreach ($recommended as $artist)
                <div class="col-lg-4">

                    <a href="{{ route('artist.view', $artist->id) }}">

                        <div class="ms_rcnt_box">
                            <div class="ms_rcnt_box_img">
                                <img src="/frontend/images/artist/{{ $artist->artistimage }}" alt="" class="img-fluid"
                                    width="100%">
                                <div class="ms_main_overlay">
                                    <div class="ms_box_overlay"></div>
                                    <div class="ms_more_icon">
                                        <img src="{{ url('frontend/assets/images/svg/more.svg') }}" alt="">
                                    </div>


                                </div>
                            </div>
                            <div class="ms_rcnt_box_text">
                                <h3><a href="../artist/single/5/dahlia-doyle.html">{{ $artist->name }}</a></h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>

    </div>
    <div class="ms_top_artist">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="ms_heading">
                    <h1>Top Artist</h1>
                </div>
            </div>

        </div>
        <div class="ms_empty_data">
        <div class="row  ">
            <div class="col-lg-6">
                    <table class="table table-borderless ">

                        <tbody>
                            @foreach ($top as $top)
                                <tr>
                                    <td> <img src="/frontend/images/artist/{{ $top->artistimage }}" height="50px" width="100px"
                                            alt=""> </td>
                                    <td>{{ $top->name }}</td>


                                    <td style="width: 200px;">
                                        <a class="text-danger" href="{{ route('artist.view', $top->id) }}">view</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
