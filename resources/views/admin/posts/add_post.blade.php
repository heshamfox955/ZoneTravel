@extends('admin.index')
@section('title', trans('admin.add_post'))
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('admin.add_post')</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('addPost')}}" method="post" role="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('admin.title')</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{old('title')}}" placeholder="Enter Your Post Tile" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('admin.title')</label>
                    <input type="text" name="tags" class="form-control" id="exampleInputEmail1" value="{{old('tag')}}" placeholder="Tags">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('admin.description')</label>
                    <textarea name="description" class="form-control ckeditor">{{old('description')}}</textarea>
                </div>

                <div class="form-group">
                    <label>@lang('admin.category')</label>
                    <select class="form-control" name="category" required>
                        <option>...</option>
                        @foreach($category as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">@lang('admin.post_image')</label>
                    <input type="file" name="image" id="exampleInputFile">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
            </div>
        </form>
    </div>
@endsection