@extends('admin.index')
@section('title', trans('admin.view_normal_user'))
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">All Users</h3>

        </div>
        <!-- /.box-header -->
<div class="box-body table-responsive no-padding">
    <table class="table table-hover" id="users-table">
        <tbody>
        <tr>
            <th>#ID</th>
            <th>@lang('admin.photo')</th>
            <th>@lang('admin.email')</th>
            <th>@lang('admin.username')</th>
            <th>@lang('admin.first_name')</th>
            <th>@lang('admin.last_name')</th>
            <th>@lang('admin.permissions')</th>
            <th>@lang('admin.created_at')</th>
            <th>@lang('admin.action')</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <th>{{$user->id}}</th>
            @if($user->path_image == null)
            <th><img class="img-rounded" src="{{asset('/upload/def.png')}}" alt="{{$user->first_name}}" style="height: 40px"></th>
            @else
            <th><img class="img-rounded" src="{{asset('upload/'.$user->path_image)}}" alt="{{$user->first_name}}" style="height: 40px;"></th>
            @endif
            <th>{{$user->email}}</th>
            <th>{{$user->username}}</th>
            <th>{{$user->first_name}}</th>
            <th>{{$user->last_name}}</th>
            <th>{{$user->permissions}}</th>
            <th>{{$user->created_at}}</th>
            <td>
                <div class="dd-nodrag btn-group ml-auto">
                    <a href="{{url('admin/delete/user/'.$user->id)}}" class="btn btn-danger btn-sm">
                        <i class="fa fa-remove"></i>
                    </a>
                </div>
            </td>

        </tr>
        @endforeach
        </tbody>
    </table>

</div>

@endsection