@extends('admin.dashboard')

@section('content')
    <div class="row">
        @if(session()->get('success'))
            <div class="alert alert-success alert-dismissible" style="text-align: center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->get('error'))
            <div class="alert alert-danger alert-dismissible" style="text-align: center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session()->get('error') }}
            </div>
        @endif
    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="box">
                <a href="{{route('posts.create')}}">
                    <div class="box-header with-border">
                        <button class="btn-flat" style="text-align: center; color: green">Insert New Post --
                        </button>
                    </div>
                </a>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered" style="text-align: center">
                        <thead>
                        <th style="width: 10px">#</th>
                        <th style="text-align: center">Title</th>
                        <th style="text-align: center">Description</th>
                        <th style="text-align: center">Created_at</th>
                        <th style="text-align: center">Operations</th>
                        </thead>
                        <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{Illuminate\Support\Str::limit($post->description , 30)}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Control
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li role="presentation" class="dropdown-header">------</li>

                                            <li><a href="{{route('posts.edit',$post->id)}}">EDIT</a></li>
                                            <li><a onclick="event.preventDefault();
                                                   document.getElementById('delete-form').submit();"> Delete</a>
                                                <form id="delete-form"
                                                      action="{{ route('posts.destroy',$post->id) }}" method="POST"
                                                      style="display: none;">
                                                    @csrf
                                                    <input name="_method" value="delete">
                                                </form>

                                            </li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="6">Posts Data Not Founded</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                    {{$posts->links()}}
                </div>

            </div>

        </div>

    </div>

@endsection