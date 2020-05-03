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
        dd(request()->all());
    }
}
