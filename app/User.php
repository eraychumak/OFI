<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Questionnaire;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        "name", "email", "password",
    ];

    protected $hidden = [
        "password", "remember_token",
    ];

    protected $casts = [
        "email_verified_at" => "datetime"
    ];

    // The questionnaires that belong to the user.
    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class, "user_id");
    }
}
