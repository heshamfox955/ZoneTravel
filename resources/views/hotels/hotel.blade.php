@extends('index')
@section('titlePage', 'Post ')
@section('content')

    <style>
        .post {
            padding: 30px;
            background: #fff;
            -webkit-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
        }
        .post .date {
            background-color: #dc3545;
            color: white;
            display: inline;
            padding: 0px 10px 0px 10px;
            font-size: 36px;
            border-radius: 50%;
        }
        .post .title {
            color: #1a1a1a;
            display: inline;
            padding-left: 20px;
            font-size: 35px;
            font-weight: bold;
        }
        .post hr {
            border: #dadada 1px solid;
            margin-bottom: 20px;
        }

    </style>

    <section class="site-hero overlay page-inside" style="background-image: url({{asset('app/frontend')}}/img/photo-1546880017-90da503826ca.jpg)">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center">
                    <h1 class="heading" data-aos="fade-up">{{$hotel->name}}</h1>
                </div>
            </div>
            <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
        </div>
    </section>
    <!-- END section -->

    <div style="margin-top: 50px"></div>

    <div class="half d-md-flex d-block">
        <div class="image aos-init aos-animate" data-aos="fade" style="background-image: url('{{asset('upload/'. $hotel->path_image)}}');"></div>
        <div class="text aos-init aos-animate" data-aos="fade-right" data-aos-delay="200">
            <h2 style="font-weight: bold; margin-bottom: 10px">{{$hotel->name}}</h2>
            {!! $hotel->description !!}
            <p class="mt-5"><a href="#" class="btn btn-primary uppercase">{{date('F,d', strtotime($hotel->created_at))}}</a></p>
            <span>Address | </span>  {{$hotel->address}}
        </div>
    </div>

    <div style="margin-bottom: 50px"></div>

@endsection