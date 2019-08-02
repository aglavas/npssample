<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    const AFTER_DELIVERY = 1;
    const AFTER_30_DAYS = 2;
    const AFTER_100_DAYS = 3;
}
