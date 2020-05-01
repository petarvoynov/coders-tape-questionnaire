<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;

class QuestionnairesController extends Controller
{
    public function create()
    {
        return view('questionnaires.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required'
        ]);

        $questionnaire = auth()->user()->questionnaires()->create($data);
 
        return redirect()->route('questionnaires.show', ['questionnaire' => $questionnaire->id]);
    }

    public function show(Questionnaire $questionnaire)
    {
        return view('questionnaires.show', compact('questionnaire'));
    }

}
