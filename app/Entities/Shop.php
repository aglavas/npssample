<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['name', 'lang'];

    public $timestamps = false;

    /**
     * Shop has one survey
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function survey()
    {
        return $this->hasOne(Survey::class, 'shop_id', 'id');
    }
}
