@extends('layouts.master')

@section('title', $question->title)

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-body">
            <h2> {{ $question->title }} </h2>
            <p>Description: {{ $question->description }}</p>
            <p>Created at: {{ $question->created_at }}</p>
            <p>Updated at: {{ $question->updated_at }}</p>
            <hr>
            <h4>Author</h4>
            Name: {{ $question->user->name }} <br>
            Email: <a href="mailto:#"> {{ $question->user->email }} </a> <br>
            @if (Auth::user() == $question->user)
            <div align="right">
                <a href="{{ action('QuestionController@edit', ['slug' => $question->slug]) }}">Edit</a> |
                <a href="{{ action('QuestionController@delete', ['slug' => $question->slug]) }}">Delete</a>
            </div>
            @endif
        </div>
    </div>
    @if (Auth::check())
        @include('answer.create')
    @endif
    @include('answer.show')
@endsection
