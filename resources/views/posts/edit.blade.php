@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    {!! Form::open(['action' => ['PostsController@update',$post->id],'method' => 'POST','enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title',$post->title,['class' =>'form-control','placeholder' =>'Title'])}}

    </div>

    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body',$post->body,['id'=>'article-ckeditor','class' =>'form-control','placeholder' =>'Body Text'])}}

    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>

    <!--
    In laravel you can only use post or get so in order to perform put or patch you must use a technique called Spoofing
    ,meaning it will change the request from get/post to what ever you want .
    -->
    {{Form::hidden('_method','put')}}

    {{Form::submit('Update',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
