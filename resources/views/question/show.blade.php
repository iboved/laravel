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
            <p>Likes: {{ $question->likes->count() }}</p>

            @if (Auth::check())
                @if (Auth::user()->likes()->where('slug', $question->slug)->count())
                    {!! Form::open(array('action' => ['QuestionController@like', 'slug' => $question->slug])) !!}
                    <p>{!! Form::submit('Dislike', ['class' => 'btn btn-danger']) !!}</p>
                    {!! Form::close() !!}
                @else
                    {!! Form::open(array('action' => ['QuestionController@like', 'slug' => $question->slug])) !!}
                    <p>{!! Form::submit('Like', ['class' => 'btn btn-primary']) !!}</p>
                    {!! Form::close() !!}
                @endif
            @endif

            <br>
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
    @if ($question->active)
        @if (Auth::check())
            @include('answer.create')
        @endif
    @else
        <h1 class="text-center login-title">Question closed!</h1>
    @endif
    @include('answer.show')
@endsection

