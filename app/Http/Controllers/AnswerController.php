<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'delete']]);
    }

    /**
     * Store answer.
     *
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $slug)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        $question = Question::findBySlugOrFail($slug);

        $answer = new Answer([
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'question_id' => $question->id
        ]);
        $answer->save();

        return redirect(action('QuestionController@show', ['slug' => $question->slug]))
            ->with('status', 'Answer added!');
    }

    /**
     * Delete answer.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function delete($slug, $id)
    {
        $answer = Answer::findOrFail($id);

        if (Auth::user() == $answer->user) {
            $answer->delete();

            return redirect(action('QuestionController@show', ['slug' => $slug]))
                ->with('status', 'Answer deleted!');
        } else {
            return response()->view('errors.403', [], 403);
        }
    }
}
