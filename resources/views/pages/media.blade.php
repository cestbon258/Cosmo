@extends('layouts.master')

@section('title', 'Home')

@section('specificScript')
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
@stop

@section('content')

    <div style="height:40px;"></div>

    <div style="height:80px; display:none;" id="results"></div>

    <!-- ##### Featured Properties Area Start ##### -->
    <section class="featured-properties-area section-padding-100-50" id="results">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp">
                        <h2>Cosmo Media</h2>
                        {{-- <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($data as $key => $media)
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                                <div class="property-thumb" style="bottom:-6px;">
                                    <iframe style="width:100%;" height="345" src="{{$media->url}}" frameborder="0" allow="accelerometer; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>

                                <div class="property-content">
                                    {{$media->title}}
                                    <div></div>
                                    <span style="color:grey; font-size:12px;">{{$media->uploaded_date}}</span>
                                </div>
                            </div>
                        </div>

                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $data->appends(request()->query())->onEachSide(1)->links() }}
            </div>
        </div>
    </section>

    <script>
        function scrollWin() {
            $('#results').css("display", "block");
            var elmnt = document.getElementById("results");
            elmnt.scrollIntoView();
        }

        scrollWin();
    </script>

    <style>
        .detail-btn {
            min-width: 54px !important;
            border-radius: 35px !important;
        }
    </style>
@stop
