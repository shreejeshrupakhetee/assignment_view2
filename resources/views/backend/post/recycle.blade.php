@extends('layouts.app')
@section('title')
    Post | Recycle
@endsection
@section('content')
    <div class="col-sm-6 col-md-9 col-lg-9">
        <div class="carbbd">
{{--            @if(Session::has('success'))--}}
{{--                <p class="alert alert-success">{{Session::get('success')}}</p>--}}
{{--            @endif--}}
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
                    <a href="{{route($route .'index')}}" class="btn btn-secondary">Post List</a>
                </h3>
            </div>



            <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>

                    <th>SN</th>
                    <th>Position</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data['row'] as $i=>$post)
                    <tr>
                        <td> {{$loop->iteration}}</td>
                        <td>{{$post->position}}</td>
                        <td>{{$post->description}}</td>
                        <td>
                            @if($post->status == 1)
                                <p class="text-success">Active</p>
                            @else
                                <p class="text-danger">Decative</p>
                            @endif</td>
                        <td>
                            {!! Form::open(['route' => [$route . 'restore',$post->id,],'method'=>'POST']) !!}
                            {{ Form::button('Restore', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm'] ) }}
                            {!! Form::close() !!}
                            <br>
                            {!! Form::open(['route' => [$route . 'forceDelete',$post->id,],'method'=>'DELETE']) !!}
                            {{ Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) }}
                            {!! Form::close() !!}


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

