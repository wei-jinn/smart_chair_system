@extends('layouts.app')

@section('content')

<div>
    <h1>Create Board</h1>
    <div class="row">
        {!! Form::open(['method'=>'POST', 'action'=>'UserWhiteboardController@store', 'files'=>true]) !!}
        {{csrf_field()}}
        <div class="'form-group">

            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control'])!!}
            {{csrf_field()}}

            <br>
        </div>


        {!! Form:: submit('Create Board', ['class'=>'btn btn-primary'])!!}
        {{csrf_field()}}
        {!! Form::close() !!}
    </div>

{{--    @include('includes.form_error')--}}


@stop
