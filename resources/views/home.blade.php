@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <div class="card">
                <div class="card-header">Main Menu</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif

                        <div>



                            <div class="btn-group" role="group" aria-label="Basic example" align="center">
                                <a class="btn btn-light" href="{{ route('face.index') }}" role="button">Face Model Management</a>
                                <a class="btn btn-light" href="{{ route('whiteboard.index') }}" role="button">Whiteboard</a>
                                <a class="btn btn-light" href="/home" role="button">Emotion Analysis</a>
                                <a class="btn btn-light" href="/home" role="button">Attendance Report</a>
                                <a class="btn btn-light" href="/home" role="button">Profile Settings</a>


                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
