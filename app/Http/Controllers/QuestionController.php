<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Questionnaire;
use App\Question;
use App\Choice;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire)
    {
        if (Gate::denies("update-questionnaire", $questionnaire)) {
            request()->session()->flash('err-msg', 'You do not own this questionnaire.');
            return redirect("/questionnaires/" . $questionnaire->id);
        }
    
        return view("questionnaire.question.create", compact("questionnaire"));
    }

    public function show(Questionnaire $questionnaire, Question $question)
    {
        if (Gate::denies("update-questionnaire", $questionnaire)) {
            request()->session()->flash('err-msg', 'You do not own this questionnaire.');
            return redirect("/questionnaires/" . $questionnaire->id);
        }

        $question->load("choices");
        return view("questionnaire.question.show", ["questionnaire" => $questionnaire, "question" => $question]);
    }

    public function store(Questionnaire $questionnaire)
    {
        if (Gate::denies("update-questionnaire", $questionnaire)) {
            request()->session()->flash('err-msg', 'You do not own this questionnaire.');
            return redirect("/questionnaires/" . $questionnaire->id);
        }

        $data = request()->validate([
            "body.body" => "required",
            "choices.*.choice" => "required"
        ]);

        $question = $questionnaire->questions()->create($data["body"]);
        $question->choices()->createMany($data["choices"]);

        return redirect("/questionnaires/" . $questionnaire->id . "/edit");
    }

    public function update(Questionnaire $questionnaire, Question $question)
    {
        if (Gate::denies("update-questionnaire", $questionnaire)) {
            request()->session()->flash('err-msg', 'You do not own this questionnaire.');
            return redirect("/questionnaires/" . $questionnaire->id);
        }

        $data = request()->validate([
            "body.body" => "required",
            "choices.*.choice" => "required"
        ]);

        $question->update($data["body"]);

        foreach ($question->choices as $i => $choice) {
            $choice->update($data["choices"][$i]);
        }
        
        return redirect()->back();
    }

    public function destroy(Questionnaire $questionnaire, Question $question)
    {
        if (Gate::denies("update-questionnaire", $questionnaire)) {
            request()->session()->flash('err-msg', 'You do not own this questionnaire.');
            return redirect("/questionnaires/" . $questionnaire->id);
        }

        $question->choices()->delete();
        $question->delete();

        return redirect("/questionnaires/" . $questionnaire->id);
    }
}
