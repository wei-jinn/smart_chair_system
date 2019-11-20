@extends('layouts.app')

@section('content')


    <h1>Whiteboards</h1>
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
        </tr>
        </thead>
        <tbody>

        @if($whiteboards)
            @foreach($whiteboards as $whiteboard)


                <tr>

                    <td>{{$whiteboard->id}}</td>
                    <td>{{$whiteboard->title}}</td>
                    <td>{{$whiteboard->content}}</td>
                    <td>{{$whiteboard->user->name}}</td>
                    <td>{{$whiteboard->created_at->diffForhumans()}}</td>
                    <td>{{$whiteboard->updated_at->diffForhumans()}}</td>



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
