@extends('admin.index')
@section('title', trans('admin.hotels'))
@section('content')


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('admin.hotels')</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover" id="users-table">
                <tbody>
                <tr>
                    <th>#ID</th>
                    <th>@lang('admin.photo')</th>
                    <th>@lang('admin.name')</th>
                    <th>@lang('admin.add_by')</th>
                    <th>@lang('admin.address')</th>
                    <th>@lang('admin.created_at')</th>
                    <th>@lang('admin.action')</th>
                </tr>
                @foreach($hotels as $hotel)
                    <tr>
                        <th>{{$hotel->id}}</th>
                        @if($hotel->path_image == null)
                            <th><img class="img-rounded" src="{{asset('/upload/def.png')}}" alt="{{$hotel->name}}" style="height: 40px"></th>
                        @else
                            <th><img class="img-rounded" src="{{asset('upload/'.$hotel->path_image)}}" alt="{{$hotel->name}}" style="height: 40px;"></th>
                        @endif
                        <th>{{$hotel->name}}</th>
                        <th>{{$hotel->user_id()->first()->username}}</th>
                        <th>{{$hotel->address}}</th>
                        <th>{{$hotel->created_at}}</th>
                        <td>
                            <div class="dd-nodrag btn-group ml-auto">
                                <a href="{{url('admin/edit/hotel/'.$hotel->id)}}" class="btn btn-info btn-sm" style="margin-right: 5px">Edit</a>
                                <a href="{{url('admin/delete/hotel/'.$hotel->id)}}" class="btn btn-danger btn-sm delete" style="margin-right: 5px">
                                    <i class="fa fa-remove"></i>
                                </a>
                                <a href="{{url('/hotel/'.$hotel->id)}}" class="btn btn-success btn-sm" style="margin-right: 5px">Show</a>
                                </a>
                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

@endsection