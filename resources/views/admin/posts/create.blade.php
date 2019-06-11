@extends('admin.dashboard')

@section('content')

    <div class="col-md-10">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title" style="color: red;"> Add New post</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <br>
            <form class="form-horizontal " action="{{route('posts.store')}}" method="post" >
                {{csrf_field()}}

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label" dir="rtl">Name</label>
                    <div class="col-md-6 col-xs-12">
                        <input type="text" name="title" value="{{old('title')}}"  class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"   placeholder="Enter post name"/>
                        @if ($errors->has('title'))
                            <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label" dir="rtl">Category</label>
                    <div class="col-md-6 col-xs-12">
                        <select name="category_id" required class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}"  >
                            <option >choose category</option>
                            @forelse($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                                @empty
                            @endforelse
                        </select>
                        @if ($errors->has('category_id'))
                            <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label" dir="rtl">Description</label>
                    <div class="col-md-6 col-xs-12">
                        <textarea type="text" cols="40" rows="8"  name="description" required class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"   placeholder="Enter Your Description">{{old('description')}}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>

            </form>

        </div>
        <!-- /.box -->


        <!-- /.box -->

    </div>

@endsection