@extends('layouts.app')

@section('content')


    <h1>Face Model Management</h1>

    <script>

        function addFace(){
            if (confirm("We are going to capture your face. Please look straight to the camera after pressing OK button")) {
                window.location.href = "/face/addface";
            }
            else{

            }
        }
    </script>

    <a class="btn btn-success" style="float:right; margin-right: 10px; margin-bottom: 10px; text-align: center" onclick="addFace()"  role="button">Add face model</a>

    <br>
    <table class="table" style="margin-left:10px">
        <thead>
        <tr>
            {{--            <th><input type ="checkbox" id="options"></th>--}}
            <th>Number</th>
            <th>Face ID</th>
            <th>Created</th>

            <th></th>

        </tr>
        </thead>
        <tbody>

        @if($faces)

            @foreach($faces as $face)

                <tr>

                    <td>{{$count++}}</td>
                    <td>{{$face->face_id}}</td>
                    <td>{{$face->created_at? $face->created_at->diffForhumans() : 'No created time'}}</td>
{{--                    <td></td>--}}

                        <td><div class ="form-group">
                                {!! Form::open(['method' => 'DELETE', 'onsubmit' => 'return confirm("Are you sure you want to remove this face model? ")', 'action'=> ['FaceModelController@destroy', $face->id] ]) !!}
                                {!! Form::submit('Remove face record' , ['class' =>'btn btn-danger', 'onsubmit' => '']) !!}
                                {!! Form::close() !!}
                            </div></td>


                </tr>



            @endforeach
        @endif


        </tbody>
    </table>

@endsection
