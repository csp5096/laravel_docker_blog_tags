@extends('app')

@section('content')

    <h1>Edit: {!! $article->title !!}</h1>

    <hr/>

    <!-- Form Model Binding -->
    {!! Form::model($article, ['method'=>'PATCH',
    'action'=>['ArticlesController@update', $article->id]]) !!}

        <!-- Form Partial Display -->
         @include('articles.form', ['submitButtonText' => 'Update Article'])

    {!! Form::close() !!}

    <!-- Form Error Message Display -->
    @include ('errors.list')

@stop