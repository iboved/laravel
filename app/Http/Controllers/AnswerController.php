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
        $question = Question::findBySlugOrFail($slug);

        if ($question->active) {
            $this->validate($request, [
                'description' => 'required',
            ]);

            $answer = Answer::create([
                'description' => $request->description,
                'user_id' => Auth::user()->id,
                'question_id' => $question->id
            ]);

            return response()->json($answer->with('user', 'question')->find($answer->id));
        } else {
            return response()->json('Forbidden', 403);
        }
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

            return response()->json('Success', 200);
        } else {
            return response()->json('Forbidden', 403);
        }
    }
}
