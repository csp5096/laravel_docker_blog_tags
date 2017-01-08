@extends('app')

@section('content')

    <h1>Write a New Article</h1>

    <hr/>

    {!! Form::open(['url' => 'articles']) !!}

         <!-- Form Partial Display -->
         @include('articles.form', ['submitButtonText' => 'Add Article'])

    {!! Form::close() !!}

    <!-- Form Error Message Display -->
    @include ('errors.list')

@stop