@extends('index')
@section('titlePage', 'Hotels')
@section('content')

    <style>

        .hotels .media {
            padding: 0 10px 0 0;
            border: 5px solid #eceaea;
            border-radius: 23px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .hotels .media img{
            width: 300px; height: 260px
        }

        .hotels .media h5 {
            font-size: 40px;
            font-weight: bold;
        }

        .hotels .media p {
            font-size: 20px;
            font-style: italic;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Write the number of
                              lines you want to be
                              displayed */
            line-height: 37px;
            max-height: 99px;
            -webkit-box-orient: vertical;
            margin: 0 0 11px 0;
        }

        .hotels .media .date-z {
            margin: 10px 0 0;
            background-color: #0008b7;
            padding: 0 10px;
            color: #fff;
            border-radius: 5px;

        }

        .read-more {
            display: block;
            text-align: right;
            padding: 5px;
            font-weight: bold;
        }

    </style>

    <section class="site-hero overlay page-inside" style="background-image: url({{asset('app/frontend')}}/img/h2.jpg) ">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center">
                    <h1 class="heading" data-aos="fade-up">Hotels</h1>
                </div>
            </div>
            <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
        </div>
    </section>
    <!-- END section -->
    <section class="section bg-light post hotels">
        <div class="container">
            @foreach($hotels as $hotel)
                <div class="media">
                    <img class="mr-3" src="{{asset('upload/'.$hotel->path_image)}}" alt="Generic placeholder image">
                    <div class="media-body">
                        <a href="{{url('hotel/'.$hotel->id)}}"><h5 class="mt-0">{{$hotel->name}}</h5></a>
                        <span class="date-z">{{date('F,d h:m', strtotime($hotel->created_at))}}</span>
                        <p>{!!  $hotel->description !!}</p>
                        <a href="{{url('hotel/'.$hotel->id)}}"><span class="read-more">Read More...</span></a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <div class="row">
        <div class="col-md-12">
            <nav role="navigation">
                <ul class="pagination custom-pagination pagination-lg">
                    <li class="page-item ">
                        {!! $hotels->render() !!}
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
