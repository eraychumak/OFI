<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Question;
use App\Response;

class Choice extends Model
{
    protected $guarded = [];

    protected $fillable = [
        "question_id", "choice"
    ];

    // The question that owns the choice.
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    // The choice has many answers.
    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
