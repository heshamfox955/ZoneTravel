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

        .post .tags{
            float: right;
            display: inline;
        }

        .post .tags .tags-li{
            background-color: #dc3545;
            color: #fff;
            padding: 2px 6px;
            border-radius: 17px;
            font-weight: 500;
            letter-spacing: 1px;
            margin: 2px;
        }
    </style>

    <section class="site-hero overlay page-inside" style="background-image: url({{asset('app/frontend')}}/img/photo-1546880017-90da503826ca.jpg)">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center">
                    <h1 class="heading" data-aos="fade-up">Blog</h1>
                    <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100">{{$post->title}}</p>
                </div>
            </div>
            <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
        </div>
    </section>
    <!-- END section -->






    <section class="section bg-light post">
        <div class="container">
            <div class="row">
                <!-- END content -->
                <div class="col-md-8">
                    <div class="post">
                        <div class="date">{{date('d', strtotime($post->created_at))}}</div>
                        <div class="title text-capitalize">{{$post->title}}</div>
                        <hr>
                        <img src="{{asset('upload/'. $post->path_image)}}" alt="Image Post" style="max-width: 100%;">
                        <hr>
                        <i class="fa fa-user"></i>  Add by : <h5 style="display: inline; font-weight: bold;" class="text-capitalize">{{$post->user_id()->first()->username}}</h5>
                        <div>
                            {!! $post->description !!}
                        </div>
                        <hr>
                        <span>Tags</span>
                        @if(count($post->tags))
                            @foreach($post->tags as $tag)
                                <ul class="list-unstyled tags">
                                    <a href="{{url('blog/tags/'.$tag->name)}}"><li class="tags-li">{{$tag->name}}</li></a>
                                </ul>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">

                        <div class="col-md-11 ml-auto">


                            <form action="{{route('blog')}}" class="sidebar-search" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="s" value="{{isset($s) ? $s : ''}}" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" style="border-radius: 0; height: 100%" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="side-box">
                                <h2 class="heading">Old Post</h2>
                                <ul class="post-list list-unstyled">
                                    @foreach($pos as $po)
                                        <li>
                                            <a href="{{url('post/'.$po->id)}}" class="d-flex">
                                                <span class="mr-3 image" style="max-height: 100px; overflow:hidden;"><img src="{{asset('upload/'.$po->path_image)}}" style="max-height: 100%; width: 100%; alt="Image placeholder" class="img-thumbnail"></span>
                                                <div>
                                                    <span class="meta">{{date('F,d-y', strtotime($po->created_at))}}</span>
                                                    <h3>{{$po->title}}</h3>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="side-box">
                                <h2 class="heading">Categories</h2>
                                <ul class="post-categories list-unstyled">
                                    @foreach($category as  $cat)
                                        <li><a href="{{url('blog/category/'.$cat->id)}}">{{$cat->name}} <span class="count">({!! $cat->blog_posts->count() !!})</span></a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="side-box">
                                <h2 class="heading">Tags</h2>
                                <ul class="post-categories list-unstyled">
                                    @foreach($tags as  $tag)
                                        <li><a href="{{url('blog/tags/'.$tag->name)}}">{{$tag->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>



                        </div>

                    </div>
                </div>

            </div>
    </section>









@endsection
