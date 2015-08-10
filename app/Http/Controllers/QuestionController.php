<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update']]);
        $this->middleware('author', ['only' => ['edit', 'update']]);
    }

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
    public function show(Request $request, $slug)
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
        return view('question.create');
    }

    /**
     * Store question.
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:150',
            'description' => 'required',
        ]);

        $question = new Question([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);
        $question->save();

        return redirect(action('QuestionController@show', ['slug' => $question->slug]));
    }

    /**
     * Edit question.
     *
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function edit($slug)
    {
        $question = Question::findBySlugOrFail($slug);

        return view('question.edit', ['question' => $question]);
    }

    /**
     * Update question.
     *
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $slug)
    {
        $question = Question::findBySlugOrFail($slug);

        $question->update([
            'title' => $request->title,
            'description' => $request->description,
            'active' => $request->active
        ]);

        return redirect(action('QuestionController@show', ['slug' => $question->slug]));
    }
}
