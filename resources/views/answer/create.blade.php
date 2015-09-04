@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-sm-12">
        {{--{!! Form::open(array('action' => ['AnswerController@store', 'slug' => $question->slug])) !!}--}}
        {{--<p>--}}
            {{--{!! Form::label('description', 'Add answer', ['class' => 'form-label']) !!}--}}
            {{--{!! Form::textarea('description', Input::old('description'), array('placeholder' => 'Type your answer here..', 'class' => 'form-control')) !!}--}}
        {{--</p>--}}

        {{--<p>{!! Form::submit('Submit!', ['class' => 'btn btn-lg btn-primary btn-block']) !!}</p>--}}
        {{--{!! Form::close() !!}--}}
        <form id="testform" action="{{ action('AnswerController@store', ['slug' => $question->slug]) }}">
            <textarea class="form-control" name="description" rows="3"></textarea>
            <button type="submit" class="btn btn-default">Send</button>
        </form>
    </div>
</div>
