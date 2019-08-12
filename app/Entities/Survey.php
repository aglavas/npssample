<?php

namespace App\Entities;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use Filterable;

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

    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->shop->name . ' - ' . $this->getEventType();
    }

    /**
     * @return float
     */
    public function getPromotersPercentAttribute()
    {
        return $this->getPercent($this->promoters);
    }

    /**
     * @return float
     */
    public function getPassivesPercentAttribute()
    {
        return $this->getPercent($this->passives);
    }

    /**
     * @return float
     */
    public function getDetractorsPercentAttribute()
    {
        return $this->getPercent($this->detractors);
    }

    /**
     * Calculate percent
     *
     * @param $entity
     * @return float
     */
    private function getPercent($entity)
    {
        $total = $this->promoters + $this->passives + $this->detractors;

        $percent = ($entity / $total) * 100;

        return round($percent, 2);
    }

    /**
     * @return string
     */
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
