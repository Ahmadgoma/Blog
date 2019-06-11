@extends('admin.dashboard')

@section('content')

    <div class="col-md-10">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title" style="color: red;">Edit -- {{$category->name}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <br>
            <form class="form-horizontal " action="{{route('categories.update',$category->id)}}" method="post">
                {{csrf_field()}}
                <input type="hidden"  name="_method" value="PUT">

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label" dir="rtl">Title</label>
                    <div class="col-md-6 col-xs-12">
                        <input type="text" name="name"  required class="form-control "  value="{{$category->name}}"/>
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>

        </div>
        <!-- /.box -->


        <!-- /.box -->

    </div>

@endsection