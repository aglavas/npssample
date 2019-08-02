<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['shop_id', 'lang', 'event_type', 'count', 'detractors', 'passives', 'promoters'];

    /**
     * Survey belongs to shop
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function getNameAttribute()
    {
        return $this->shop->name . ' - ' . $this->getEventType();
    }

    private function getEventType()
    {
        if ($this->event_type === EventType::AFTER_DELIVERY) {
            return 'After Delivery';
        } elseif ($this->event_type === EventType::AFTER_30_DAYS) {
            return 'After 30 Days';
        } elseif ($this->event_type === EventType::AFTER_100_DAYS) {
            return 'After 100 Days';
        }
    }
}
