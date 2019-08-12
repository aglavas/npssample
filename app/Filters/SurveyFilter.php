<?php

namespace App\Filters;

class SurveyFilter extends QueryFilters
{
    /**
     * Filter products by locale
     *
     * @param $locale
     */
    public function locale($locale)
    {
        $this->builder->where('lang', '=', $locale);
    }
}
