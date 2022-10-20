@extends('layouts.app')
@section('title')
    Post
@endsection
@section('content')
    <div class="col-sm-6 col-md-9 col-lg-9">
        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title">{{$title}}-Form
                    <a href="{{route($route .'index')}}" class="btn btn-success">List</a>
                </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::model($data['row'], ['route' => [$route.'update', $data['row']->id ]]) !!}
            {!! Form::hidden('_method', 'PUT') !!}
            @csrf

            <div class="card-body">
                <div class="form-group row">
                    {!! Form::label('name', 'Name: <span class="required">*</span>',['class' => 'col-sm-2 col-form-label'],false); !!}
                    <br>
                    <div class="col-sm-10">
                        {!! Form::text('name', null, [ 'class'=>'form-control', 'placeholder'=>'Enter position']); !!}
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                </div>
                <div class="form-group row">
                    {!! Form::label('status','Status: <span class="required">*</span>',['class' => 'col-sm-2 col-form-label'],false); !!}

                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            {{Form::radio('status','1',['class'=>'form-check-input'])}}
                            <label class="form-check-label ml-2" for="inlineRadio1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            {{Form::radio('status','0',['class'=>'form-check-input'])}}
                            <label class="form-check-label ml-2" for="inlineRadio2">De-active</label>
                        </div>
                        @error('status')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <!-- /.card-body -->
                    </div>

                    <div class="form-group row">
                        {!! Form::label('category_id', 'Category: <span class="required">*</span>',['class' => 'col-sm-2 col-form-label'],false); !!}
                        <div class="col-sm-10">
                            {!! Form::select('category_id', $data['categories'], null,['class' => 'form-control','placeholder' => 'Select Category']) !!}
                            @error('category_id')
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>


{{--            <div class="card-body">--}}
{{--                <div class="form-group row">--}}
{{--                    {!! Form::label('name', 'Name *',['class' => 'col-sm-2 col-form-label']); !!}--}}

{{--                    <div class="col-sm-10">--}}
{{--                        {!! Form::text('name',null, ['oninput'=>'makeSlug()', 'class'=>'form-control', 'placeholder'=>'Enter name']); !!}--}}
{{--                        @error('name')--}}
{{--                        <p class="text-danger">{{$message}}</p>--}}
{{--                        @enderror--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    {!! Form::label('slug', 'Slug *',['class' => 'col-sm-2 col-form-label']); !!}--}}

{{--                    <div class="col-sm-10">--}}
{{--                        {!! Form::text('slug',null, [ 'class'=>'form-control','readonly', 'placeholder'=>'Slug is auto-generated '] ); !!}--}}
{{--                        <!-- /.card-body -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            {!! Form::close() !!}
            {{--        </form>--}}
        </div>
    </div>
@endsection
@section('scripts')
    <script>

        function makeSlug() {
            var name = document.getElementById('name').value;
            var slug = document.getElementById('slug');
            slug.value = string_to_slug(name);
        }
        function string_to_slug(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
            var to   = "aaaaaeeeeeiiiiooooouuuunc------";
            for (var i = 0, l = from.length; i < l; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/\?/g, '-')
                .replace(/-+/g, '-'); // collapse dashes

            return str;
        };

    </script>
@endsection

