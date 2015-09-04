@foreach ($answers as $answer)
    <div class="panel panel-default">
        <div class="panel-body" id="view_comment">
            <h5>Author</h5>
            Name: {{ $answer->user->name }} | Email: <a href="mailto:#"> {{ $answer->user->email }} </a>
            <br>
            Answer: {{ $answer->description }}
            <p>Created at: {{ $answer->created_at }}</p>
            @if (Auth::user() == $answer->user)
                <div align="right">
                    <a href="{{ action('AnswerController@delete', ['slug' => $question->slug, 'id' => $answer->id]) }}">Delete</a>
                </div>
            @endif
        </div>
    </div>
@endforeach
