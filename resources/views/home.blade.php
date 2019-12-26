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
                                <a class="btn btn-light" href="{{ route('emotion.index') }}" role="button">Emotion Analysis</a>
                                <a class="btn btn-light" href="https://smp.upm.edu.my/smp/action/security/loginSmpSetup?TX=2099921104358692" role="button">E SMP</a>
                                <a class="btn btn-light" href="https://upm-id.upm.edu.my/ssostudent/login?service=http%3A%2F%2Flearninghub.upm.edu.my%2Fblastdk%2Flogin%2Findex.php" role="button">Putra Blast</a>
                                <a class="btn btn-light" href="https://www.edmodo.com/" role="button">Edmodo</a>
                                <a class="btn btn-light" href="https://kahoot.com/" role="button">KaHoot</a>


                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
