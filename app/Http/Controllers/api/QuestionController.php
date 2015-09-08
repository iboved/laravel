<?php

namespace App\Http\Controllers\api;

use Validator;
use Illuminate\Http\Request;
use App\Question;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $questions = Question::all();

        return response()->json($questions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:150',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $question = new Question([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => Auth::user()->id
            ]);

            $question->save();

            return response()->json($question, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($slug)
    {
        $question = Question::findBySlugOrFail($slug);

        return response()->json($question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $slug)
    {
        $question = Question::findBySlugOrFail($slug);

        $this->validate($request, [
            'title' => 'required|max:150',
            'description' => 'required',
        ]);

        $question->update([
            'title' => $request->title,
            'description' => $request->description,
            'active' => $request->active
        ]);

        return response()->json($question);
    }

    /**
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($slug)
    {
        $question = Question::findBySlug($slug);
        if ($question) {
            $question->delete();
        }

        return response()->json([], 204);
    }
}
