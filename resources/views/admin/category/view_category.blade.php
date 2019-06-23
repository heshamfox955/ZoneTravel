@extends('admin.index')
@section('title', trans('admin.category'))
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('admin.category')</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover" id="users-table">
                <tr>
                <tr>
                    <th>#ID</th>
                    <th>@lang('admin.name')</th>
                    <th>@lang('admin.add_by')</th>
                    <th>@lang('admin.created_at')</th>
                    <th>@lang('admin.action')</th>
                </tr>
                @foreach($category as $cate)
                    <tr>
                        <th>{{$cate->id}}</th>
                        <th>{{$cate->name}}</th>
                        <th class="text-capitalize"><a href="{{route('profile', $cate->user_id)}}">{{$cate->user_id()->first()->username}}</a></th>
                        <th>{{$cate->created_at}}</th>
                        <td>

                            <div class="dd-nodrag btn-group ml-auto">
                                @if(auth()->user()->permissions == 'admin')
                                    <a href="{{url('admin/edit/category/'.$cate->id)}}" class="btn btn-info btn-sm " style="margin-right: 5px">Edit</a>
                                    <a href="{{url('admin/delete/category/'.$cate->id)}}" class="btn btn-danger btn-sm delete">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                @elseif(auth()->user()->permissions == 'modertor' && $cate->user_id == auth()->user()->id)
                                    <a href="{{url('admin/edit/category/'.$cate->id)}}" class="btn btn-info btn-sm" style="margin-right: 5px">Edit</a>
                                    <a href="{{url('admin/delete/category/'.$cate->id)}}" class="btn btn-danger btn-sm delete">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                @endif
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