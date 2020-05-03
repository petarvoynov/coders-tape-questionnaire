<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\Question;

class QuestionsController extends Controller
{
    public function create(Questionnaire $questionnaire)
    {
        return view('questions.create', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required'
        ]);

        $question = $questionnaire->questions()->create($data['question']);

        $question->answers()->createMany($data['answers']);

        return redirect()->route('questionnaires.show', ['questionnaire' => $questionnaire->id]);
    }

    public function destroy(Questionnaire $questionnaire, Question $question)
    {
        $question->answers()->delete();
        $question->delete();

        return redirect()->route('questionnaires.show', ['questionnaire' => $questionnaire->id]);
    }
}
