@extends('layouts.app')

@section('content')


    <h1>Whiteboards</h1>
  <a class="btn btn-success" style="float:right; margin-right: 10px; text-align: center" href="{{route('whiteboard.create')}}" role="button">Create new board</a>

    {!! Form::open(['method'=>'POST', 'action'=>'UserWhiteboardController@join']) !!}



        {!! Form::text('url', null, ['placeholder' => 'Copy whiteboard url here then press join board', 'class'=>'url-control'])!!}
        {{csrf_field()}}




    {!! Form:: submit('Join Board', ['class'=>'btn btn-primary', 'style' => 'float:right;  margin-right: 10px' ])!!}
            {{csrf_field()}}
    {!! Form::close() !!}



    {{csrf_field()}}










    <table class="table">
        <thead>
        <tr>
            {{--            <th><input type ="checkbox" id="options"></th>--}}
            <th>ID</th>
            <th>Title</th>
{{--            <th>Content</th>--}}
            <th>Board Owner</th>
            <th>Created</th>
            <th>Updated</th>
            <th></th>
            <th></th>

        </tr>
        </thead>
        <tbody>

        @if($whiteboards)
            @foreach($whiteboards as $whiteboard)



                <tr>

                    <td>{{$whiteboard->id}}</td>
                    <td><a href="http://127.0.0.1:8090?whiteboardid={{$whiteboard->uuid}}&username={{$username}}">{{$whiteboard->title}}</a></td>
{{--                    <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>>--}}
{{--                    <td>{{$whiteboard->content}}</td>--}}
                    <td>{{$whiteboard->user->name}}</td>
                    <td>{{$whiteboard->created_at->diffForhumans()}}</td>
                    <td>{{$whiteboard->updated_at->diffForhumans()}}</td>
                    <td>
{{--                        <a href="{{route('whiteboard.viewmembers', $whiteboard->id)}}">View Members</a>--}}
                        <a class="btn btn-light-white" href="{{route('whiteboard.viewmembers', $whiteboard->id)}}" role="button">View Members</a>

                    </td>

                    @if($whiteboard->user->id == $uid)
                    <td><div class ="form-group">
                            {!! Form::open(['method' => 'DELETE', 'onsubmit' => 'return confirm("Are you sure you want to destroy this board? The people whom you shared with would not be able to join this board too.")', 'action'=> ['UserWhiteboardController@destroy', $whiteboard->id] ]) !!}
                            {!! Form::submit('Destroy board' , ['class' =>'btn btn-danger', 'onsubmit' => '']) !!}
                            {!! Form::close() !!}
                        </div></td>
                        @else
                        <td>
                            <div class ="form-group">
                                {!! Form::open(['method' => 'DELETE', 'onsubmit' => 'return confirm("Are you sure you want to remove this board from list?")', 'action'=> ['UserWhiteboardController@destroy', $whiteboard->id] ]) !!}
                                {!! Form::submit('Remove from list' , ['class' =>'btn btn-danger', 'onsubmit' => '']) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>

                        @endif




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
