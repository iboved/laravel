<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
    public function show($slug)
    {
        $question = Question::findBySlugOrFail($slug);

        return view('question.show', ['question' => $question]);
    }

    /**
     * Create new question.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (Auth::check()) {
            return view('question.create');
        } else {
            return response()->view('errors.401', [], 401);
        }
    }

    /**
     * Store question.
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'title' => 'required|max:150',
                'description' => 'required',
            ]);

            $question = new Question();
            $question->title = $request->title;
            $question->description = $request->description;
            $question->user_id = Auth::user()->id;
            $question->save();

            return redirect(action('QuestionController@show', ['slug' => $question->slug]));
        } else {
            return response()->view('errors.401', [], 401);
        }
    }
}
