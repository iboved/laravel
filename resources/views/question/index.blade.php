@extends('layouts.master')

@section('title', 'Homepage')

@section('stylesheets')
    @parent
    <style>
        .row DIV .col-xs-12:hover {
            background-color: #e5e5e5;
        }
    </style>
@show

@section('content')
    <div class="col-xs-12 col-sm-12">
        <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
        </p>
        <div class="jumbotron">
            <h2>Questions and Answers site</h2>
            <p>Short description of site</p>
        </div>
        <div class="row">
            @foreach ($questions as $question)
            <div class="col-xs-12 col-lg-12">
                <p class="text-primary" style="font-size: 27px"><a href="{{ action('QuestionController@show', ['slug' => $question->slug]) }}">{{ $question->title }}</a></p>
                <p>Description: {{ $question->description }}</p>
                <p>Author: {{ $question->user->name }}</p>
                <p>Created at: {{ $question->created_at }}</p>
                <p>Updated at: {{ $question->updated_at }}</p>
                <p><a class="btn btn-primary" href="{{ action('QuestionController@show', ['slug' => $question->slug]) }}" role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-12.col-lg-12-->
            @endforeach
        </div><!--/row-->
    </div><!--/.col-xs-12.col-sm-9-->
@endsection
