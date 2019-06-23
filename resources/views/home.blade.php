@extends('index')
@section('titlePage', 'Home')
@section('content')

    <style>
        .ion-android-bar:before {
            content: "\f368";
            font-size: 53px;
        }
    </style>

    <section class="site-hero overlay" style="background-image: url({{asset('app/frontend')}}/img/1.jpg)">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center">
                    <h1 class="heading" data-aos="fade-up">Welcome to <em>Zone</em>Travel</h1><br>
                    <p data-aos="fade-up" data-aos-delay="100"><a href="{{route('login')}}" class="btn uppercase btn-primary mr-md-2 mr-0 mb-3 d-sm-inline d-block">Sign in</a></p>
                </div>
            </div>
            <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
        </div>
    </section>
    <!-- END section -->

    <section class="features text-center" style="margin: 50px 0 0 0;">
        <div class="container">
            <h2 class="h1" style="padding-bottom: 30px; font-weight: bold">Our Features</h2>
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="feat hvr-grow-rotate wow bounceInLeft" data-wow-duration="2s" data-wow-offset="200" style="visibility: visible; animation-duration: 2s; animation-name: bounceInLeft;">
                        <i class="fa fa-plane fa-3x" style="padding-bottom: 10px"></i>
                        <h4>Plane Travel</h4>
                        <p>We arrange all travel and travel between cities and Southeast Asian countries by air, tourist buses, seafarers and private cars, with all the facilities and services offered by the choice of suitable seats for passengers and punctuality..</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="feat hvr-buzz-out wow bounceInUp" data-wow-duration="2s" data-wow-offset="200" style="visibility: visible; animation-duration: 2s; animation-name: bounceInUp;">
                        <i class="ion-android-bar" style="padding-bottom: 10px"></i>
                        <h4>Food & Drink</h4>
                        <p>We always take care of the details of visitors from food and drink and offer all tastes of different foods, including Western and Eastern.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="feat hvr-wobble-vertical wow bounceInRight" data-wow-duration="2s" data-wow-offset="200" style="visibility: visible; animation-duration: 2s; animation-name: bounceInRight;">
                        <i class="fa fa-car fa-3x" style="padding-bottom: 10px"></i>
                        <h4>Providing a Cars</h4>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit Cras justo odio, dapibus ac facilisis .</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="feat hvr-bounce-in wow bounceInDown" data-wow-duration="2s" data-wow-offset="200" style="visibility: visible; animation-duration: 2s; animation-name: bounceInDown;">
                        <i class="fa fa-hotel fa-3x" style="padding-bottom: 10px"></i>
                        <h4>Hotels</h4>
                        <p>We are interested in securing all hotel reservations to you so that you can benefit from the discounts granted to us by hotels and other features such as honeymoon services in the rooms and the addition of beds, so that all our reservations including breakfast, tax and service..</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- END section -->

    <section class="section slider-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-8">
                    <h2 class="heading" data-aos="fade-up">A gorgeous place to enjoy your life.</h2>
                    <p class="lead" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In dolor, iusto doloremque quo odio repudiandae sunt eveniet? Enim facilis laborum voluptate id porro, culpa maiores quis, blanditiis laboriosam alias. Sed.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
                        <div class="slider-item">
                            <img src="{{asset('app/frontend')}}/img/s1.jpg" alt="Image placeholder" class="img-fluid">
                        </div>
                        <div class="slider-item">
                            <img src="{{asset('app/frontend')}}/img/slider-2.jpg" alt="Image placeholder" class="img-fluid">
                        </div>
                        <div class="slider-item">
                            <img src="{{asset('app/frontend')}}/img/s3.jpg" alt="Image placeholder" class="img-fluid">
                        </div>
                        <div class="slider-item">
                            <img src="{{asset('app/frontend')}}/img/s4.jpg" alt="Image placeholder" class="img-fluid">
                        </div>
                        <div class="slider-item">
                            <img src="{{asset('app/frontend')}}/img/slider-5.jpg" alt="Image placeholder" class="img-fluid">
                        </div>
                        <div class="slider-item">
                            <img src="{{asset('app/frontend')}}/img/slider-6.jpg" alt="Image placeholder" class="img-fluid">
                        </div>
                    </div>
                    <!-- END slider -->
                </div>

                <div class="col-md-12 text-center"><a href="#" class="">View More Photos</a></div>

            </div>
        </div>
    </section>
    <!-- END section -->

    <section class="section blog-post-entry bg-pattern">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-8">
                    <h2 class="heading" data-aos="fade-up">Recent Blog Post</h2>
                    <p class="lead" data-aos="fade-up">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In dolor, iusto doloremque quo odio repudiandae sunt eveniet? Enim facilis laborum voluptate id porro, culpa maiores quis, blanditiis laboriosam alias. Sed.</p>
                </div>
            </div>
            <div class="row">

                @foreach($posts as $post)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="100">
                    <div class="media media-custom d-block mb-4">
                        <a href="{{url('/post/'.$post->id)}}" class="mb-4 d-block"  style="max-height: 300px; min-width: 100%; overflow: hidden"><img src="{{asset('upload/'.$post->path_image)}}" alt="Image placeholder" class="img-fluid"></a>
                        <div class="media-body">
                            <span class="meta-post">{{date('F,d-y', strtotime($post->created_at))}}</span>
                            <h2 class="mt-0 mb-3"><a href="{{url('/post/'.$post->id)}}">{{$post->title}}</a></h2>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- END section -->
    <section class="section testimonial-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-8">
                    <h2 class="heading" data-aos="fade-up">Testimonial</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial text-center">
                        <div class="author-image mb-3">
                            <img src="{{asset('app/frontend')}}/img/p_1.jpg" alt="Image placeholder" class="rounded-circle">
                        </div>
                        <blockquote>

                            <p>&ldquo;Das Personal war ausgesprochen nett und hilfsbereit. Die Lage am Meer ist toll und dazu nahe am Zentrum ohne den direkten Trubel abzubekommen.”</p>
                        </blockquote>
                        <p><em>&mdash; Ronald</em></p>

                    </div>
                </div>
                <!-- END col -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial text-center">
                        <div class="author-image mb-3">
                            <img src="{{asset('app/frontend')}}/img/p_2.jpg" alt="Image placeholder" class="rounded-circle">
                        </div>
                        <blockquote>
                            <p>“Away from the big main streets, it is located by the ocean. A wonderful ocean view is right there when having a breakfast. All the members are exceptionally helpful and make you feel at home”</p>
                        </blockquote>
                        <p><em>&mdash; Anna</em></p>
                    </div>
                </div>
                <!-- END col -->

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial text-center">
                        <div class="author-image mb-3">
                            <img src="{{asset('app/frontend')}}/img/p_3.jpg" alt="Image placeholder" class="rounded-circle">
                        </div>
                        <blockquote>

                            <p>“La localisation, tout est accessible à pieds, près des plusieurs centres de plongées, en face d’un spot de plongée et de snorkeling, petite piscine sympa, jolie architecture du lieu, terrasse sympa sur la mer&rdquo;</p>
                        </blockquote>
                        <p><em>&mdash; Stephanie</em></p>
                    </div>
                </div>
                <!-- END col -->
            </div>
        </div>
    </section>
@endsection