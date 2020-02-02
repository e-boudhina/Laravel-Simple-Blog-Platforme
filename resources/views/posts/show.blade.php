@extends('layouts.app')

@section('content')
    <h1>{{$post->title}} </h1>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>

    <a href="/posts" class="btn btn-outline-secondary btn-sm">Go Back</a>
    <br><br>
    <div class="col-md-4 col-sm-4">
        <img style="width: 100%;" src="/storage/cover_images/{{$post->cover_image}}">
    </div>
        <div class="card-body">

        <!--we use this syntax to parse the html -->
        {!! $post->body!!}

        </div>
    <hr>
    <small>Last updated on {{$post->updated_at}}</small>
    <hr>

    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)

            <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-secondary btn-sm">Edit</a>

            {!!Form::open(['action' => ['PostsController@destroy',$post->id], 'method' => 'POST','class'=>'float-right'])!!}
            {{Form::hidden('_method' ,'delete')}}
            {{Form::submit('Delete',['class' => 'btn btn-outline-danger btn-sm'])}}
            {{Form::close()}}

        @endif
    @endif

@endsection
