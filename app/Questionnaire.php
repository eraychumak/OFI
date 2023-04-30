<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Question;
use App\Respondent;

class Questionnaire extends Model
{
    protected $guarded = [];

    protected $fillable = [
        "user_id", "questionnaire_id", "title", "description"
    ];

    // The user that owns the questionnaire.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // The questionnaire has many questions.
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    
    // The questionnaire has many respondents.
    public function respondents()
    {
        return $this->hasMany(Respondent::class);
    }
}
