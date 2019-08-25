<?php

namespace App\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use Translatable;

    public $translatedAttributes = ['content'];

    public $translationModel = 'App\Entities\Translation\LabelTranslation';

    public $timestamps = false;

    protected $fillable = ['title'];
}
