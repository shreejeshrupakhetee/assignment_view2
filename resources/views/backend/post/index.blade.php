@extends('layouts.app')
@section('title')
    Post | List
@endsection
@section('content')
    <div class="col-sm-6 col-md-9 col-lg-9">
        <div class="carbbd">
            @if(Session::has('success'))
                <p class="alert alert-success">{{Session::get('success')}}</p>
            @endif
            @if(Session::has('error'))
                <p class="alert alert-danger">{{Session::get('danger')}}</p>
            @endif
            @if(Session::has('warning'))
                <p class="alert alert-warning">{{Session::get('warning')}}</p>
            @endif
        </div>
        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title">{{$title}}
                    <a href="{{route($route .'create')}}" class="btn btn-success">Create</a>
                    <a href="{{route($route .'recycle')}}" class="btn btn-success">Re-Cycle Bin</a>
                </h3>
            </div>



            <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>

                    <th>SN</th>
                    <th>Name</th>

                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data['row'] as $i=>$post)
                    <tr>
                        <td> {{$loop->iteration}}</td>
                        <td>{{$post->name}}</td>

                        <td>{{$post->cat->name}}</td>
                        <td>
                            @if($post->status == 1)
                                <p class="text-success">Active</p>
                            @else
                                <p class="text-danger">Decative</p>
                            @endif
                        <td>
                            <a href="{{route($route .'show',$post->id)}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-eye">Show</i>
                            </a>
                            <a href="{{route($route .'edit',$post->id)}}" class="btn btn-sm btn-warning">
                                <i class="fa fa-pencil-alt">Edit</i>
                            </a>
                            <form class="d-inline" action="{{route($route .'destroy',$post->id)}}" method="post">
                                <input type="hidden" name="_method" value="delete"/>
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger ">
                                    <i class="fa fa-trash">Delete</i>
                                </button>
                            </form>


                        </td>


                    </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center;"><p class="text-danger">No Data Found </p> </td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

