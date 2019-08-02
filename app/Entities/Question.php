<?php

namespace App\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use Translatable;

    public $translatedAttributes = ['content'];

    public $translationModel = 'App\Entities\Translation\QuestionTranslation';

    public $timestamps = false;
}
