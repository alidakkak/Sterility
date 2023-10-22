<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnswerResource;
use App\Models\QuestionUser;
use App\Models\User;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request) {
        $user = auth()->user()->id;
        $answers = $request->answer;
        $questionIds = $request->question_ids;

        foreach ($answers as $key => $answer){
            QuestionUser::create([
                'answer' => $answer,
                'user_id' => $user,
                'question_id' => $questionIds[$key]
            ]);
        }
            return response()->json('Success');
    }

    public function index(){
//        $answer = QuestionUser::all();
//        return AnswerResource::collection($answer);

        return User::with('questionUser', 'questionUser.question')->get();
    }

    public function update(Request $request)
    {
        $user = auth()->user()->id;
        $answers = $request->answer;
        $questionIds = $request->question_ids;

        foreach ($answers as $key => $answer) {
            QuestionUser::where('user_id', $user)
                ->where('question_id', $questionIds[$key])
                ->update([
                    'answer' => $answer,
                ]);
        }
        return response()->json('Success');
    }


}
