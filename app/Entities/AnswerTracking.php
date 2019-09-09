<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class AnswerTracking extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['cookie_name', 'cookie_value'];
}
