@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="{{route('user.index')}}" class="btn btn-success">User</a>
                    <a href="{{route('post.create')}}" class="btn btn-success">Post</a>
                    <a href="{{route('category.create')}}" class="btn btn-success">Category</a>
                </div>
                <p>Total Post ={{$data['post']}}</p>
                <p>Total Category ={{$data['cat']}}</p>

            </div>

        </div>
    </div>
</div>
@endsection
