@extends('admin.index')
@section('title', trans('admin.setting'))
@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('admin.setting')</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('setting')}}" method="post" role="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('admin.email')</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$users->email}}" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="username">@lang('admin.username')</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{$users->username}}"  placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="first_name">@lang('admin.first_name')</label>
                    <input type="text" name="first_name" class="form-control" id="first_name"  value="{{$users->first_name}}" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="last_name">@lang('admin.last_name')</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{$users->last_name}}"  placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label for="password">@lang('admin.password')</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password2">@lang('admin.password_confiremation')</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password2" placeholder="Password Confiramtion">
                </div>
                <div class="form-group">
                    <label for="location">@lang('admin.location')</label>
                    <input type="text" name="location" class="form-control" id="location" value="{{$users->location}}"  placeholder="Location">
                </div>
                <div class="form-group">
                    <label for="about">@lang('admin.about')</label>
                    <textarea name="about" class="form-control ckeditor">{{$users->about}}</textarea>
                </div>
                <div class="form-group">
                    <label for="date">@lang('admin.date')</label>
                    <input type="date" name="date" class="form-control" id="date" placeholder="Date Of Birth" value="{{$users->dob}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">@lang('admin.your_photo')</label>
                    <input type="file" name="image" id="exampleInputFile">
                    @if($users->path_image != null)
                        <img src="{{asset('upload/'.$users->path_image)}}" alt="{{$users->first_name}}" style="height: 300px; max-width: 300px;">
                    @endif
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
            </div>
        </form>
    </div>
@endsection
