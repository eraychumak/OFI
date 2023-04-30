<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Respondent;

class Response extends Model
{
    protected $guarded = [];

    // The respondent that owns the response.
    function respondent()
    {
        return $this->belongsTo(Respondent::class);
    }
}
