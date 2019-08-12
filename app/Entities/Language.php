<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['locale', 'country'];
}
