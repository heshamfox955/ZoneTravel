@extends('admin.index')
@section('title', trans('admin.profile'))
@section('content')


        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="img-responsive img-rounded center-block" style="max-width: 200px; max-height: 300px" src="@if($user->path_image != null) {{asset('upload/'.$user->path_image)}} @else{{asset('upload/def.png')}} @endif" alt="User profile picture">

                <h3 class="profile-username text-center text-capitalize text-bold">{{$user->first_name}}</h3>

                @if(app()->getLocale() == 'en')
                    <ul class="list-group list-group-unbordered" style="font-size: larger">
                        <li class="list-group-item">
                             <b>@lang('admin.email')</b> <b class="pull-right">{{$user->email}}</b>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('admin.username')</b> <b class="pull-right">{{$user->username}}</b>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('admin.first_name')</b> <b class="pull-right">{{$user->first_name}}</b>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('admin.last_name')</b> <b class="pull-right">{{$user->last_name}}</b>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('admin.join_at')</b> <b class="pull-right">{{date("d-m-Y", strtotime($user->created_at))}}</b>
                        </li>
                    </ul>
                    @if(auth()->user()->id == $user->id)
                        <a href="{{route('setting')}}"><button class="btn btn-info btn-sm" style="font-size: 17px">@lang('setting')</button></a>
                    @endif

                @else

                    <ul class="list-group list-group-unbordered" style="font-size: larger">
                        <li class="list-group-item">
                            <b>@lang('admin.email')</b> <b class="pull-left">{{$user->email}}</b>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('admin.username')</b> <b class="pull-left">{{$user->username}}</b>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('admin.first_name')</b> <b class="pull-left">{{$user->first_name}}</b>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('admin.last_name')</b> <b class="pull-left">{{$user->last_name}}</b>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('admin.join_at')</b> <b class="pull-left">{{date("d-m-Y", strtotime($user->created_at))}}</b>
                        </li>
                    </ul>
                    @if(auth()->user()->id == $user->id)
                        <a href="{{route('setting')}}"><button class="btn btn-info btn-sm" style="font-size: 17px">@lang('setting')</button></a>
                    @endif


                @endif
            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin.about')</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <strong><i class="fa fa-calendar-check-o"></i> @lang('admin.date')</strong>

                <p class="text-muted">
                    {{$user->dob}}
                </p>

                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"> </i>@lang('admin.location')</strong>

                <p class="text-muted text-capitalize"> {{$user->location}} </p>

                <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i> @lang('admin.about')</strong>

                {!! $user->about !!}
            </div>
            <!-- /.box-body -->
        </div>
        @foreach($posts as $post)
            <div class="box box-widget">
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="img-circle" src="{{asset('upload/'.$post->user_id()->first()->path_image)}}" alt="User Image" style="width: 45px; height: 45px">
                        <span class="username text-capitalize"><a href="{{route('profile', $post->user_id()->first()->id)}}">{{$post->user_id()->first()->username}}</a></span>
                        <span class="description">{{date('F,d h:m', strtotime($post->created_at))}}</span>
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
                    <img class="img-responsive pad" style="max-height: 700px" src="{{asset('upload/'.$post->path_image)}}" alt="Photo">

                    {!! $post->description !!}
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> view</button>
                </div>
                <!-- /.box-body -->
            </div>
        @endforeach

@endsection