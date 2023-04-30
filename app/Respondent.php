<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Questionnaire;
use App\Response;

class Respondent extends Model
{
    protected $guarded = [];
    
    // The questionnaire owns the respondent.
    function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    // The respondents has many responses.
    function responses()
    {
        return $this->hasMany(Response::class);
    }
}
