@extends('layouts.app')
@section('title')
    Post| View
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
                               <tr>
                    <td>Status</td>
                    <td>@if($data['row']->status == 1)
                        <p class="text-success">Active</p>
                        @else
                            <p class="text-danger">De-Active</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                    {{$data['row']->cat->name}}
                    </td>
                </tr>
                <tr>
                    @if($data['row']->updated_by== Null)


                    @else
                        <td>Updated By</td>
                        <td>{{$data['row']->updatedBy->name}}</td>
                    @endif
                </tr>
            </table>
        </div>
    </div>
@endsection
