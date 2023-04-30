<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Questionnaire;
use App\Choice;

class Question extends Model
{
    protected $guarded = [];

    protected $fillable = [
        "questionnaire_id", "body"
    ];

    // The questionnaire that owns the question.
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    // The question owns many choices.
    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
