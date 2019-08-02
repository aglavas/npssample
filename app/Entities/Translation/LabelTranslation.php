<?php

namespace App\Entities\Translation;

use Illuminate\Database\Eloquent\Model;

class LabelTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['content', 'locale'];
}
