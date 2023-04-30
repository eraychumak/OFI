<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;

class RespondentController extends Controller
{
    public function index(Questionnaire $questionnaire)
    {
        $questionnaire->load("respondents");
        $questionnaire->load("questions.choices.responses");
        return view("questionnaire.responses.index", ["questionnaire" => $questionnaire]);
    }

    public function create(Questionnaire $questionnaire)
    {
        $data = request()->validate([
            "choices.*.choice_id" => "required",
            "choices.*.question_id" => "required"
        ]);

        $respondent = $questionnaire->respondents()->create();
        $respondent->responses()->createMany($data["choices"]);

        return view("questionnaire.thankyou", ["questionnaire" => $questionnaire]);
    }
}
