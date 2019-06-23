@extends('admin.index')
@section('title', trans('admin.edit_category'))

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('admin.edit_category')</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('editCategory',$cat)}}" method="post" role="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('admin.name')</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$cat->name}}" placeholder="Enter Your Category name" required>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                </div>
        </form>
    </div>
@endsection