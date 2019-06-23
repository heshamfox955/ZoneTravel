@extends('admin.index')
@section('title', trans('admin.dashboard'))
@section('content')

    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                @if(auth()->user()->permissions == 'admin')
                    <a href="{{route('viewUser')}}"><button type="button" class="btn btn-block btn-info btn-lg" style="border-radius: 0; font-size: 25px">@lang('admin.view_user')</button></a>
                @else
                    <button type="button" class="btn btn-block btn-info btn-lg disabled"  style="border-radius: 0; font-size: 25px">@lang('admin.view_user')</button>
                @endif
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{route('viewHotels')}}"><button type="button" class="btn btn-block btn-success btn-lg" style="border-radius: 0; font-size: 25px">@lang('admin.hotels')</button></a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{route('viewCategory')}}"><button type="button" class="btn btn-block btn-danger btn-lg" style="border-radius: 0; font-size: 25px">@lang('admin.view_category')</button></a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{route('viewPosts')}}"><button type="button" class="btn btn-block btn-info btn-lg" style="border-radius: 0; background-color: #444; border-color: #696969; font-size: 25px">@lang('admin.view_post')</button></a>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div style="margin-bottom: 20px"></div>

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                @if(auth()->user()->permissions == 'admin')
                    <a href="{{route('newUser')}}"><button type="button" class="btn btn-block btn-info btn-lg" style="border-radius: 0; background-color: #444; border-color: #696969; font-size: 25px">@lang('admin.add_user')</button></a>
                @else
                    <a href="{{route('viewPosts')}}"><button type="button" class="btn btn-block btn-info btn-lg disabled" style="border-radius: 0; background-color: #444; border-color: #696969; font-size: 25px">@lang('admin.add_user')</button></a>
                @endif
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{route('addCategory')}}"><button type="button" class="btn btn-block btn-danger btn-lg" style="border-radius: 0; background-color: #a20500; font-size: 25px">@lang('admin.add_category')</button></a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{route('addPost')}}"><button type="button" class="btn btn-block btn-info btn-lg" style="border-radius: 0; font-size: 25px">@lang('admin.add_post')</button></a>
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{route('addHotel')}}"><button type="button" class="btn btn-block btn-success btn-lg" style="border-radius: 0; font-size: 25px">@lang('admin.add_hotel')</button></a>
            </div><!-- /.col -->
        </div>
        <div style="margin-bottom: 20px"></div>

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-black"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">@lang('admin.view_user')</span>
                        <span class="info-box-number">{{$users->count()}}</span>
                    </div><!-- /.info-box-content -->
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-bookmark-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">@lang('admin.all_posts')</span>
                        <span class="info-box-number">{{$post->count()}}</span>
                    </div><!-- /.info-box-content -->
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-tasks"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">@lang('admin.all_category')</span>
                        <span class="info-box-number">{{$cat->count()}}</span>
                    </div><!-- /.info-box-content -->
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-tags"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">@lang('admin.tags')</span>
                        <span class="info-box-number">{{$tags->count()}}</span>
                    </div><!-- /.info-box-content -->
                </div>
            </div>

        </div>

        <div style="margin-bottom: 20px"></div>

        <div class="row">
            <div class="col-md-6">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            @foreach($last_posts as $post)
                                <li><a href="{{url('/post/'.$post->id)}}">{{$post->title}} <span class="pull-right badge bg-red">View</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="box-footer no-padding">

                        <ul class="nav nav-stacked">
                            @foreach($last_user as $user)
                                <li><a href="{{url('/admin/profile/'.$user->id)}}">{{$user->username}} <span class="pull-right badge bg-green">Profile</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>



        <div style="margin-bottom: 20px"></div>
        @if(!empty($last_post))
        <div class="box box-widget">
            <div class="box-header with-border">
                <div class="user-block">
                    <img class="img-circle" src="{{asset('upload/'.$last_post->user_id()->first()->path_image)}}" alt="User Image" style="width: 45px; height: 45px">
                    <span class="username text-capitalize"><a href="{{route('profile', $last_post->user_id()->first()->id)}}">{{$last_post->user_id()->first()->username}}</a></span>
                    <span class="description">{{date('F,d h:m', strtotime($last_post->created_at))}}</span>
                </div>
                <!-- /.user-block -->
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                        <i class="fa fa-circle-o"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
                <img class="img-responsive pad" src="{{asset('upload/'.$last_post->path_image)}}" alt="Photo">

                {!! $last_post->description !!}
                <a href="{{url('/post/'.$last_post->id)}}"><button type="button" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> view</button></a>
            </div>
            <!-- /.box-body -->
        </div>
    @endif
    </section><!-- /.content -->

@endsection