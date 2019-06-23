@extends('index')
@section('titlePage', 'Tags')
@section('content')


    <section class="site-hero overlay page-inside" style="background-image: url({{asset('app/frontend')}}/img/photo-1523478482487-1eed2b3d9939.jpg)">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center">
                    <h1 class="heading" data-aos="fade-up">Tags</h1>
                </div>
            </div>
            <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
        </div>
    </section>
    <!-- END section -->
    <section class="section bg-light post">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row mb-5">
                        @foreach($posts as $post)
                            <div class="col-md-6">
                                <div class="media media-custom d-block mb-4">
                                    <a href="{{url('post/'.$post->id)}}" class="mb-4 d-block" style="max-height: 300px; min-width: 100%; overflow: hidden"><img src="{{asset('upload/'.$post->path_image)}}" alt="Image placeholder" class="img-fluid"></a>
                                    <div class="media-body">
                                        <a href="{{url('blog/category/'.$post->cat_id()->first()->id)}}"><span style=" float: right;
    background-color: #ff8080;
    font-weight: 500;
    color: #fff;
    letter-spacing: 1px;
    padding: 0px 6px;
    border-radius: 3px;">{{$post->cat_id()->first()->name}}</span></a>
                                        <span class="meta-post">{{date('F,d-y', strtotime($post->created_at))}}</span>
                                        <h2 class="mt-0 mb-3"><a href="#">{{$post->title}}</a></h2>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <nav role="navigation">
                                <ul class="pagination custom-pagination pagination-lg">
                                    <li class="page-item ">

                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END content -->
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
                                <h2 class="heading">Popular Post</h2>
                                <ul class="post-list list-unstyled">
                                    @foreach($pos as $po)
                                        <li>
                                            <a href="{{url('post/'.$po->id)}}" class="d-flex">
                                                <span class="mr-3 image" style="max-height: 100px; overflow:hidden;"><img src="{{asset('upload/'.$po->path_image)}}" style="max-height: 100%; width: 100%;" alt="Image placeholder"  class="img-thumbnail"></span>
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
        </div>
    </section>


@endsection