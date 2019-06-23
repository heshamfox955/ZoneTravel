@extends('admin.index')
@section('title', trans('admin.edit_post'))
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('admin.edit_post')</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('editPost', $post)}}" method="post" role="form" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('admin.title')</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{$post->title}}" placeholder="Enter Your Post Tile" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tags</label>
                    <input type="text" name="tags" class="form-control" id="exampleInputEmail1" value="{{implode(' ',$post->tags->pluck('name')->toArray()) }}" placeholder="Tags">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('admin.description')</label>
                    <textarea name="description" class="form-control ckeditor">{{$post->description}}</textarea>
                </div>

                <div class="form-group">
                    <label>@lang('admin.category')</label>
                    <select class="form-control" name="category" required>
                        <option>...</option>
                        @foreach($category as $cat)
                            <option value="{{$cat->id}}" @if($cat->id == $post->cat_id) selected @endif>{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">@lang('admin.post_image')</label>
                    <input type="file" name="image" id="exampleInputFile">
                    <img class="img-thumbnail" style="margin-top: 20px; max-height: 300px; max-width: 500px" src="{{asset('upload/'.$post->path_image)}}" alt="{{$post->title}}">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
            </div>
        </form>
    </div>
@endsection