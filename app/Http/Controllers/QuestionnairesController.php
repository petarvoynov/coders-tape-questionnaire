<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionnairesController extends Controller
{
    public function create(){
        return view('questionnaire.create');
    }
}
