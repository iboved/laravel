<?php

namespace App\Http\Controllers\api;

use Validator;
use Illuminate\Http\Request;
use App\Question;
use App\Answer;
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

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:150',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $question->update([
                'title' => $request->title,
                'description' => $request->description,
                'active' => $request->active
            ]);

            return response()->json($question);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
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

    /**
     * Display a listing of the related resource.
     *
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAnswers($slug)
    {
        $question = Question::findBySlugOrFail($slug);

        $answers = $question->answers;

        return response()->json($answers);
    }

    /**
     * Store a newly created related resource in storage.
     *
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeAnswer(Request $request, $slug)
    {
        $question = Question::findBySlugOrFail($slug);

        if ($question->active) {
            $validator = Validator::make($request->all(), [
                'description' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            } else {
                $answer = new Answer([
                    'description' => $request->description,
                    'user_id' => Auth::user()->id,
                    'question_id' => $question->id
                ]);
                $answer->save();

                return response()->json($answer, 201);
            }
        } else {
            return response()->json('Forbidden', 403);
        }
    }

    /**
     * Remove the specified related resource from storage.
     *
     * @param $slug
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAnswer($slug, $id)
    {
        $question = Question::findBySlugOrFail($slug);
        $answer = $question->answers->find($id);

//        $answer = Answer::find($id);

        if ($answer) {
            if (Auth::user() == $answer->user) {
                $answer->delete();
            } else {
                return response()->json('Forbidden', 403);
            }
        }

        return response()->json([], 204);
    }
}
