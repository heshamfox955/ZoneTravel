@extends('index')
@section('titlePage', 'About')
@section('content')


    <section class="site-hero overlay page-inside" style="background-image: url({{asset('app/frontend')}}/img/h2.jpg)">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center">
                    <h1 class="heading" data-aos="fade-up">About</h1>
                    <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100">About ZoneTravel</p>
                </div>
            </div>
            <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
        </div>
    </section>

    <div class="about" style="margin-top: 50px ">
        <div class="container">
            <h1 class="text-center" style="font-weight: bold;
    font-size: 60px;
    font-family: sans-serif;">About Us</h1>
            <div style="border: 1px solid #eee; margin-bottom: 20px;"></div>
            <p  class="text-center" style="font-size: 19px; color: #444; font-weight: 400; font-style: italic; padding-bottom: 50px;">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit .Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit .</p>
        </div>
    </div>

@endsection