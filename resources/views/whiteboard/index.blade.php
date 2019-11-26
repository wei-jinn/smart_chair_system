@extends('layouts.app')

@section('content')


    <h1>Whiteboards</h1>
    <div style="float:right; padding-right: 50px" ><a href="{{route('whiteboard.create')}}">Create Board</a></div>

    {!! Form::open(['method'=>'POST', 'action'=>'UserWhiteboardController@join']) !!}

    {{csrf_field()}}

    <div class="'form-group">

        {!! Form::label('URL', 'URL:') !!}
        {!! Form::text('url', null, ['class'=>'form-control'])!!}
        {{--                {{csrf_field()}}--}}

    </div>

    {!! Form:: submit('Join Board', ['class'=>'btn btn-primary'])!!}
    {{--        {{csrf_field()}}--}}
    {!! Form::close() !!}





    <table class="table">
        <thead>
        <tr>
            {{--            <th><input type ="checkbox" id="options"></th>--}}
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Board Owner</th>
            <th>Created</th>
            <th>Updated</th>
            <th></th>

        </tr>
        </thead>
        <tbody>

        @if($whiteboards)
            @foreach($whiteboards as $whiteboard)



                <tr>

                    <td>{{$whiteboard->id}}</td>
                    <td><a href="http://whiteboard.test:8090?whiteboardid={{$whiteboard->uuid}}&username={{$user->name}}">{{$whiteboard->title}}</a></td>
{{--                    <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>>--}}
                    <td>{{$whiteboard->content}}</td>
                    <td>{{$whiteboard->user->name}}</td>
                    <td>{{$whiteboard->created_at->diffForhumans()}}</td>
                    <td>{{$whiteboard->updated_at->diffForhumans()}}</td>
                    <td><div class ="form-group">
                            {!! Form::open(['method' => 'DELETE', 'onsubmit' => 'return confirm("Are you sure you want to delete this board?")', 'action'=> ['UserWhiteboardController@destroy', $whiteboard->id] ]) !!}

                            {!! Form::submit('Remove board' , ['class' =>'btn btn-danger col-sm-6', 'onsubmit' => '']) !!}


                            {!! Form::close() !!}
                        </div></td>



                </tr>



                @endforeach
            @endif




{{--        @if($posts)--}}

            {{--            {!! Form::open(['method'=>'POST', 'action'=>'DeleteMultiplePostsController@deleteMultiple']) !!}--}}


            {{--            {{csrf_field()}}--}}
            {{--            {{method_field('delete')}}--}}
            {{--            <div class="'form-group">--}}

            {{--                {!! Form::select('checkBoxArray', array('delMultiple' => 'delete ticked')) !!}--}}
            {{--                {!! Form::text('name',null, ['class'=>'form-control'])!!}--}}
            {{--                {{csrf_field()}}--}}


            {{--            </div>--}}

            {{--            <div class="form-group">--}}

            {{--                {!! Form:: submit('Create Post', ['class'=>'btn btn-primary'])!!}--}}
            {{--                {{csrf_field()}}--}}

            {{--                </div>--}}



{{--            @foreach($posts as $post)--}}
{{--                <a></a>--}}
{{--                <tr>--}}
{{--                    --}}{{--                    <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$post->id}}"></td>--}}
{{--                    <td>{{$post->id}}</td>--}}
{{--                    <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>--}}
{{--                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>--}}
{{--                    <td>{{$post->user->name}}</td>--}}
{{--                    <td>{{$post->category? $post->category->name : 'Uncategorised'}}</td>--}}

{{--                    <td>{{$post->body}}</td>--}}
{{--                    <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>--}}
{{--                    <td><a href="{{route('admin.comments.show', $post->id)}}">View Comment</a></td>--}}
{{--                    <td>{{$post->created_at->diffForHumans()}}</td>--}}
{{--                    <td>{{$post->updated_at->diffForHumans()}}</td>--}}


{{--                </tr>--}}

{{--            @endforeach--}}

{{--        @endif--}}

        </tbody>
    </table>

@endsection
