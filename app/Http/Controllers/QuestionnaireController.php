<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use App\Questionnaire;
use App\QuestionnaireOwner;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $questionnaires = Questionnaire::all();

        foreach ($questionnaires as $questionnaire) {
            $questionnaire->load("user");
        }

        return view("questionnaire.index", ["questionnaires" => Questionnaire::all()]);
    }

    public function edit(Questionnaire $questionnaire)
    {
        if (Gate::denies("update-questionnaire", $questionnaire)) {
            request()->session()->flash('err-msg', 'You do not own this questionnaire to perform changes on it.');
            return redirect("/questionnaires/" . $questionnaire->id);
        }

        $questionnaire->load("questions.choices");
        $questionnaire->load("respondents");
        return view("questionnaire.edit", ["questionnaire" => $questionnaire]);
    }

    public function create()
    {
        return view("questionnaire.create");
    }

    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load("user");
        $questionnaire->load("questions.choices");
        return view("questionnaire.show", ["questionnaire" => $questionnaire]);
    }

    public function store()
    {
        if (!Auth::check()) {
            request()->session()->flash('err-msg', 'You must be logged in to create a new questionnaire.');
            return redirect("/");
        }

        $data = request()->validate([
            "title" => "required",
            "description" => "required"
        ]);

        $questionnaire = auth()->user()->questionnaires()->create([
            "title" => $data["title"],
            "description" => $data["description"]
        ]);

        return redirect("/questionnaires/" . $questionnaire->id);
    }

    public function update(Questionnaire $questionnaire)
    {
        if (Gate::denies("update-questionnaire", $questionnaire)) {
            request()->session()->flash('err-msg', 'You do not own this questionnaire.');
            return redirect("/questionnaires/" . $questionnaire->id);
        }
        
        $data = request()->validate([
            "title" => "required",
            "description" => "required"
        ]);

        $questionnaire->update($data);

        return redirect("/questionnaires/" . $questionnaire->id . "/edit");
    }

    public function destroy(Questionnaire $questionnaire)
    {
        if (Gate::denies("update-questionnaire", $questionnaire)) {
            request()->session()->flash('err-msg', 'You do not own this questionnaire to perform changes on it.');
            return redirect("/questionnaires/" . $questionnaire->id);
        }
        
        $questionnaire->respondents()->delete();
        $questionnaire->questions()->delete();
        $questionnaire->delete();

        return redirect("/");
    }
}
