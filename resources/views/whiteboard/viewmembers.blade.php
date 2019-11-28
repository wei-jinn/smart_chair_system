@extends('layouts.app')

@section('content')


    <h1>Members who joined {{$whiteboard->title}}</h1>


    <table class="table">
        <thead>
        <tr>
            {{--            <th><input type ="checkbox" id="options"></th>--}}

            <th>ID</th>
            <th>Name</th>

        </tr>
        </thead>
        <tbody>
        @if($members)
            @foreach($members as $member)



                <tr>

                    <td>{{$member->id}}</td>
                    <td>{{$member->name}}</td>





                </tr>



            @endforeach
        @endif


        </tbody>
    </table>

@endsection
