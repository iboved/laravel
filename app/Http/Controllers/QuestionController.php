<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * Show a list of all questions.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $order = $request->query->get('order', 'created_at');

        $questions = Question::orderBy($order, 'desc')->get();

        return view('question.index', ['questions' => $questions]);
    }

    /**
     * Show one question by slug.
     *
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function showQuestion($slug)
    {
        $question = Question::findBySlugOrFail($slug);

        return view('question.show', ['question' => $question]);
    }
}
