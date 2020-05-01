<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->blongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
