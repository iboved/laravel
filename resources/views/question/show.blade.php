@extends('layouts.master')

@section('title', $question->title)

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2> {{ $question->title }} </h2>
            <p>Description: {{ $question->description }}</p>
            <p>Created at: {{ $question->created_at }}</p>
            <p>Created at: {{ $question->updated_at }}</p>
            <hr>
            <h4>Author</h4>
            Name: {{ $question->user->name }} <br>
            Email: <a href="mailto:#"> {{ $question->user->email }} </a> <br>
            <div align="right">
                <a href="#">Edit</a> |
                <a href="#">Delete</a>
            </div>
        </div>
    </div>
@endsection