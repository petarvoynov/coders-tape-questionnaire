<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;

class SurveysController extends Controller
{
    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answers');

        return view('surveys.show', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required|email'
        ]);
    }
}
