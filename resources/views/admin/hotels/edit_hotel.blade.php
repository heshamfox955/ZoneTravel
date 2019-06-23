@extends('admin.index')
@section('title', trans('admin.edit_hotel'))
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('admin.edit_hotel')</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('editHotel', $hotel->id)}}" method="post" role="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('admin.name')</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$hotel->name}}" placeholder="Enter Name Hotel" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('admin.address')</label>
                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" value="{{$hotel->address}}" placeholder="Address">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('admin.description')</label>
                    <textarea name="description" class="form-control ckeditor">{{$hotel->description}}</textarea>
                </div>


                <div class="form-group">
                    <label for="exampleInputFile">@lang('admin.post_image')</label>
                    <input type="file" name="image" id="exampleInputFile">
                    <img src="{{asset('upload/'.$hotel->path_image)}}" alt="{{$hotel->name}}" style="    height: 300px;
                                        max-width: 300px;
                                        border: 1px solid #c3c3c3;
                                        border-radius: 20px;
                                        margin-top: 10px;">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
            </div>
        </form>
    </div>
@endsection