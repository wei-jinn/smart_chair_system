@extends('layouts.app')

@section('content')

<div>
    <h1>Create Whiteboard</h1>
{{--    <div class="row">--}}
    <div>
        {!! Form::open(['method'=>'POST', 'action'=>'UserWhiteboardController@store', 'files'=>true]) !!}
        {{csrf_field()}}
        <div class="'form-group">

            {!! Form::label('title', 'Title:', ['style'=>'margin:20px']) !!}
            {!! Form::text('title', null, ['class'=>'url-control'])!!}






        {!! Form:: submit('Create Board', ['class'=>'btn btn-success', 'style'=>'margin:20px'])!!}

        {!! Form::close() !!}


{{--    @include('includes.form_error')--}}


@endsection
