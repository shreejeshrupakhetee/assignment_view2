@extends('layouts.app')
@section('title')
    Category| View
@endsection
@section('content')
    <div class="col-sm-6 col-md-9 col-lg-9">
        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title">{{$title}}
                    <a href="{{route($route .'index')}}" class="btn btn-success">List</a>
                </h3>
            </div>
            <table class="table-bordered">
                <tr>
                    <td>Name</td>
                    <td>{{$data['row']->name}}</td>
                </tr>

            </table>
        </div>
    </div>
@endsection
