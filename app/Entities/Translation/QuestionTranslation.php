<?php

namespace App\Entities\Translation;

use Illuminate\Database\Eloquent\Model;

class QuestionTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['content', 'locale'];
}
