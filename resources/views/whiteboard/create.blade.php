@extends('layouts.app')

@section('content')

<div>
    <h1>Create Whiteboard</h1>
{{--    <div class="row">--}}
    <div>
        {!! Form::open(['method'=>'POST', 'action'=>'UserWhiteboardController@store', 'files'=>true]) !!}
        {{csrf_field()}}
        <div class="'form-group">

            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control'])!!}


            <br>
        </div>


        {!! Form:: submit('Create Board', ['class'=>'btn btn-primary'])!!}

        {!! Form::close() !!}
    </div>

{{--    @include('includes.form_error')--}}


@endsection
