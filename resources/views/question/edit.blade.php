@extends('layouts.master')

@section('title', 'Create question')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1 class="text-center login-title">Edit question</h1>
    {!! Form::model($question, ['action' => ['QuestionController@update', 'slug' => $question->slug], 'method' => 'put']) !!}
    <p>
        {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}
        {!! Form::text('title', Input::old('title'), array('placeholder' => 'Title', 'class' => 'form-control')) !!}
    </p>

    <p>
        {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
        {!! Form::textarea('description', Input::old('description'), array('placeholder' => 'Description', 'class' => 'form-control')) !!}
    </p>

    <p>
        {!! Form::label('active', 'Active', ['class' => 'form-label']) !!}
        {!! Form::checkbox('active', true, $question->active) !!}
    </p>

    <p>{!! Form::submit('Submit!', ['class' => 'btn btn-lg btn-primary btn-block']) !!}</p>
    {!! Form::close() !!}
@endsection
