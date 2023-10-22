<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(){
        $question = Question::all();
        return QuestionResource::collection($question);
    }

    public function store(Request $request) {
        $question = Question::create($request->all());
        return QuestionResource::make($question);
    }

    public function show(Question $question) {
        return QuestionResource::make($question);
    }

    public function update(Request $request, Question $question) {
        $question->update($request->all());
        return response()->json([
            'Updated SuccessFully',
            $question
        ]);
    }

    public function delete(Question $question) {
        $question->delete();
        return response()->json([
           'Message' => 'Question deleted SuccessFully', $question
        ]);
    }
}
