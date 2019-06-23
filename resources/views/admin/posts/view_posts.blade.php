@extends('admin.index')
@section('title', trans('admin.view_post'))
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('admin.view_post')</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover" id="users-table">
                <tbody>
                <tr>
                    <th>#ID</th>
                    <th>@lang('admin.photo')</th>
                    <th>@lang('admin.title')</th>
                    <th>@lang('admin.add_by')</th>
                    <th>@lang('admin.category')</th>
                    <th>@lang('admin.created_at')</th>
                    <th>@lang('admin.action')</th>
                </tr>
                @foreach($posts as $post)
                    <tr>
                        <th>{{$post->id}}</th>
                        <th><img class="img-rounded" src="{{asset('/upload/'.$post->path_image)}}" alt="{{$post->title}}" style="height: 40px"></th>
                        <th>{{$post->title}}</th>
                        <th>{{$post->user_id()->first()->username}}</th>
                        <th>{{$post->cat_id()->first()->name}}</th>
                        <th>{{$post->created_at}}</th>
                        <td>

                            <div class="dd-nodrag btn-group ml-auto">
                                <a href="{{url('admin/edit/post/'.$post->id)}}" class="btn btn-info btn-sm" style="margin-right: 5px">Edit</a>
                                <a href="{{url('admin/delete/post/'.$post->id)}}" class="btn btn-danger btn-sm delete" style="margin-right: 5px">
                                    <i class="fa fa-remove"></i>
                                </a>
                                <a href="{{url('/post/'.$post->id)}}" class="btn btn-success btn-sm" style="margin-right: 5px">Show</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <!-- /.box-body -->
    </div>

@endsection