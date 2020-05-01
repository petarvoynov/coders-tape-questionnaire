<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;

class QuestionsController extends Controller
{
    public function create(Questionnaire $questionnaire)
    {
        return view('questions.create', compact('questionnaire'));
    }
}
