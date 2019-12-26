@extends('layouts.app')

@section('content')

    <h1>Emotions Based On Facial Expression</h1>
    <table class="table">
        <thead>
        <tr>

            <th>Name</th>
            <th>Happy</th>
            <th>Sad</th>
            <th>Fear</th>
            <th>Confused</th>
            <th>Angry</th>
            <th>Calm</th>
            <th>Surprised</th>
            <th>Disgusted</th>
            <th>Most Likely</th>
            <th></th>


        </tr>
        </thead>
        <tbody>

        @if($emotion)


                <tr>

                    <td>{{$user->name}}</td>
                    <td>{{$emotion->happy}}%</td>
                    <td>{{$emotion->sad}}%</td>
                    <td>{{$emotion->fear}}%</td>
                    <td>{{$emotion->confused}}%</td>
                    <td>{{$emotion->angry}}%</td>
                    <td>{{$emotion->calm}}%</td>
                    <td>{{$emotion->surprised}}%</td>
                    <td>{{$emotion->disgusted}}%</td>
                    <td>{{$emotion->most_likely}}</td>
                    <td>{{$emotion->created_at->diffForhumans()}}</td>

                </tr>


        @endif

        </tbody>
    </table>

@endsection
